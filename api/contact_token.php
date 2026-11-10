<?php
/**
 * Jeton anti-spam du formulaire de contact
 * Contient l'horodatage d'affichage du formulaire, signé (HMAC) pour ne pas être falsifiable
 */

// Délai minimum (en secondes) entre l'affichage du formulaire et son envoi
const CONTACT_FORM_MIN_DELAY = 3;

function contact_form_secret(): string
{
    // getenv() ne voit pas toujours les variables SetEnv (selon le SAPI) : $_SERVER en secours
    $secret = getenv('CONTACT_FORM_SECRET');
    if ($secret === false || $secret === '') {
        $secret = $_SERVER['CONTACT_FORM_SECRET'] ?? '';
    }
    if (is_string($secret) && $secret !== '') {
        return $secret;
    }
    // Repli : clé propre au serveur, absente du dépôt
    return hash('sha256', __DIR__ . '|' . php_uname('n'));
}

// Génère le jeton "horodatage.signature" à placer dans le formulaire
function contact_form_token(): string
{
    $time = (string) time();
    return $time . '.' . hash_hmac('sha256', $time, contact_form_secret());
}

// Renvoie le nombre de secondes depuis l'affichage, ou null (et $error) si le jeton est absent ou invalide
function contact_form_token_age($token, ?string &$error = null): ?int
{
    $error = null;
    if (!is_string($token) || $token === '') {
        $error = 'jeton absent';
        return null;
    }
    if (!preg_match('/^(\d{1,12})\.([0-9a-f]{64})$/', $token, $matches)) {
        $error = 'jeton mal formé';
        return null;
    }
    $expected = hash_hmac('sha256', $matches[1], contact_form_secret());
    if (!hash_equals($expected, $matches[2])) {
        $error = 'signature invalide';
        return null;
    }
    return time() - (int) $matches[1];
}
