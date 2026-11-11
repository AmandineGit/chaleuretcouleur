<?php
/**
 * Vérification Cloudflare Turnstile du formulaire de contact
 * Arrête les robots qui pilotent un vrai navigateur (le champ piège et le jeton
 * d'horodatage de contact_token.php ne suffisent pas contre eux)
 */

// Clé publique (site key), visible dans la page : pas besoin de la cacher
const TURNSTILE_SITE_KEY = '0x4AAAAAAF8pfHhsuhkOKJMJ';

// Clé secrète : uniquement sur le serveur (SetEnv TURNSTILE_SECRET_KEY "...")
function turnstile_secret(): string
{
    // getenv() ne voit pas toujours les variables SetEnv (selon le SAPI) : $_SERVER en secours
    $secret = getenv('TURNSTILE_SECRET_KEY');
    if ($secret === false || $secret === '') {
        $secret = $_SERVER['TURNSTILE_SECRET_KEY'] ?? '';
    }
    return is_string($secret) ? $secret : '';
}

// Renvoie true si Cloudflare valide le jeton, false sinon (raison dans $error)
function turnstile_verify($token, ?string &$error = null): bool
{
    $error = null;
    $secret = turnstile_secret();
    if ($secret === '') {
        // Clé absente : on laisse passer plutôt que de bloquer tous les messages
        error_log('Formulaire de contact : TURNSTILE_SECRET_KEY absente, vérification Turnstile ignorée');
        return true;
    }
    if (!is_string($token) || $token === '') {
        $error = 'turnstile absent';
        return false;
    }

    $ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'secret' => $secret,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
    ]));
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false) {
        // Cloudflare injoignable : on laisse passer plutôt que de perdre un vrai message
        error_log("Formulaire de contact : Turnstile injoignable ($curlError), vérification ignorée");
        return true;
    }

    $result = json_decode($response, true);
    if (!empty($result['success'])) {
        return true;
    }
    $codes = $result['error-codes'] ?? [];
    $error = 'turnstile refusé (' . implode(', ', is_array($codes) ? $codes : []) . ')';
    return false;
}
