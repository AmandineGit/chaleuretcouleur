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

  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet"/>

  <!-- Styles -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/custom.css" />
  <link rel="stylesheet" href="css/responsive.css" />

  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>" />
</head>

<body class="<?= htmlspecialchars($bodyClass ?? '') ?>">
  <div class="hero_area">
    <!-- header -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand brand-text" href="index.php">
            Chaleur <span>et</span> Couleur
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <?php foreach ($navLinks as $key => $link): ?>
                <li class="nav-item">
                  <a class="nav-link<?= $currentPage === $key ? ' active' : '' ?>" href="<?= $link['href'] ?>"><?= $link['label'] ?></a>
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
