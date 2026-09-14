<?php
/**
 * Proxy sécurisé pour le formulaire de contact
 * Envoie les données vers n8n avec authentification
 */

// Configuration CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Gestion de la requête OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Vérifier que c'est une requête POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Configuration
$N8N_WEBHOOK_URL = 'https://n8n.digital-pragma.fr/webhook/contact'; // À remplacer
$N8N_AUTH_TOKEN = ''; // Optionnel : token d'authentification n8n

// Lire les données JSON envoyées
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validation des données
$errors = [];

if (empty($data['lastname']) || strlen($data['lastname']) < 2) {
    $errors[] = 'Le nom doit contenir au moins 2 caractères';
}

if (empty($data['firstname']) || strlen($data['firstname']) < 2) {
    $errors[] = 'Le prénom doit contenir au moins 2 caractères';
}

if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'L\'adresse email est invalide';
}

if (empty($data['phone']) || strlen($data['phone']) < 10) {
    $errors[] = 'Le numéro de téléphone est invalide';
}

if (empty($data['position'])) {
    $errors[] = 'Veuillez sélectionner votre fonction';
}

if (empty($data['message']) || strlen($data['message']) < 10) {
    $errors[] = 'Le message doit contenir au moins 10 caractères';
}

// Si des erreurs, renvoyer
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Erreur de validation',
        'errors' => $errors
    ]);
    exit;
}

// Préparer les données à envoyer vers n8n
$payload = [
    'lastname' => htmlspecialchars(trim($data['lastname'])),
    'firstname' => htmlspecialchars(trim($data['firstname'])),
    'email' => filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL),
    'phone' => htmlspecialchars(trim($data['phone'])),
    'position' => htmlspecialchars(trim($data['position'])),
    'message' => htmlspecialchars(trim($data['message'])),
    'timestamp' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
];

// Préparer les headers pour n8n
$headers = [
    'Content-Type: application/json'
];

// Ajouter le token d'authentification si configuré
if (!empty($N8N_AUTH_TOKEN)) {
    $headers[] = 'Authorization: Bearer ' . $N8N_AUTH_TOKEN;
}

// Envoyer vers n8n avec cURL
$ch = curl_init($N8N_WEBHOOK_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// Vérifier la réponse
if ($httpCode >= 200 && $httpCode < 300) {
    echo json_encode([
        'success' => true,
        'message' => 'Votre message a été envoyé avec succès !'
    ]);
} else {
    // Log l'erreur (optionnel)
    error_log("Erreur n8n: HTTP $httpCode - $curlError");

    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer plus tard.'
    ]);
}
