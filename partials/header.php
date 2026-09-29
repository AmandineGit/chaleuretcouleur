<?php
// Attendu avant l'include : $pageTitle, $pageDescription, $canonicalUrl, $currentPage, $bodyClass (optionnel)
$navLinks = [
  'accueil' => ['href' => 'index.php', 'label' => 'Accueil'],
  // 'hint' : petit texte en bulle au survol sur ordinateur, en sous-titre dans le
  // menu replié (voir .nav-link-hint dans custom.css)
  'retour-a-la-couleur' => ['href' => 'retour-a-la-couleur.php', 'label' => 'Retour à la couleur', 'hint' => 'La démarche'],
  'retour' => ['href' => 'presence-en-couleur.php', 'label' => 'Présence en couleur', 'hint' => 'Visite à domicile'],
  'mediation' => ['href' => 'mediation-par-la-couleur.php', 'label' => 'Médiation par la couleur', 'hint' => 'Atelier collectif'],
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
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet"/>

  <!-- Styles -->
  <?php
    // Paramètre de version basé sur la date de modification du fichier, pour
    // forcer le navigateur/l'hébergeur à recharger le fichier (CSS, JS, images)
    // après chaque modification plutôt que de servir une version mise en cache.
    // Défini ici, utilisé aussi dans les pages et dans partials/footer.php.
    $assetVersion = static function (string $file): string {
        $path = __DIR__ . '/../' . $file;
        return $file . '?v=' . (is_file($path) ? filemtime($path) : time());
    };
  ?>
  <link rel="stylesheet" href="<?= $assetVersion('css/style.css') ?>" />
  <link rel="stylesheet" href="<?= $assetVersion('css/custom.css') ?>" />
  <link rel="stylesheet" href="<?= $assetVersion('css/responsive.css') ?>" />

  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>" />
</head>

<body class="<?= htmlspecialchars($bodyClass ?? '') ?>">
  <div class="hero_area">
    <!-- header -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-menu custom_nav-container pt-3">
          <a class="navbar-brand brand-logo" href="index.php">
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
            <div class="d-flex ml-auto flex-column align-items-center">
              <ul class="navbar-nav">
                <?php foreach ($navLinks as $key => $link): ?>
                <li class="nav-item">
                  <a class="nav-link nav-link-<?= $key ?><?= $currentPage === $key ? ' active' : '' ?>" href="<?= $link['href'] ?>"><?= $link['label'] ?><?php if (isset($link['hint'])): ?> <span class="nav-link-hint"><?= htmlspecialchars($link['hint']) ?></span><?php endif; ?></a>
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
