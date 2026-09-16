<?php
// Attendu avant l'include : $pageTitle, $pageDescription, $canonicalUrl, $currentPage, $bodyClass (optionnel)
$navLinks = [
  'accueil' => ['href' => 'index.php', 'label' => 'Accueil'],
  'retour' => ['href' => 'retour-a-la-couleur.php', 'label' => 'Retour à la couleur'],
  'mediation' => ['href' => 'mediation-par-la-couleur.php', 'label' => 'Médiation par la couleur'],
  'galerie' => ['href' => 'galerie.php', 'label' => 'Galerie'],
  'contact' => ['href' => 'contact.php', 'label' => 'Contact'],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="favicon/favicon.svg" />
  <link rel="shortcut icon" href="favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png" />
  <link rel="manifest" href="favicon/site.webmanifest" />
  <meta name="theme-color" content="#FBF7F0" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet"/>

  <!-- Styles -->
  <?php
    // Paramètre de version basé sur la date de modification du fichier, pour
    // forcer le navigateur/l'hébergeur à recharger le CSS après chaque déploiement
    // plutôt que de servir une version mise en cache.
    $cssVersion = static function (string $file): string {
        $path = __DIR__ . '/../' . $file;
        return $file . '?v=' . (is_file($path) ? filemtime($path) : time());
    };
  ?>
  <link rel="stylesheet" href="<?= $cssVersion('css/style.css') ?>" />
  <link rel="stylesheet" href="<?= $cssVersion('css/custom.css') ?>" />
  <link rel="stylesheet" href="<?= $cssVersion('css/responsive.css') ?>" />

  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>" />
</head>

<body class="<?= htmlspecialchars($bodyClass ?? '') ?>">
  <div class="hero_area">
    <!-- header -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand brand-logo-test" href="index.php">
            <img src="favicon/web-app-manifest-512x512.png" alt="Chaleur et Couleur">
            <span class="brand-text">
              <span class="brand-chaleur">Chaleur</span> <span class="brand-et">et</span> <span class="brand-couleur">Couleur</span>
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-label">Menu</span>
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <?php foreach ($navLinks as $key => $link): ?>
                <li class="nav-item">
                  <a class="nav-link nav-link-<?= $key ?><?= $currentPage === $key ? ' active' : '' ?>" href="<?= $link['href'] ?>"><?= $link['label'] ?></a>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header -->
  </div>

  <main>
