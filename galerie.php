<?php
$pageTitle = "Galerie | Chaleur et Couleur";
$pageDescription = "Galerie de Chaleur et Couleur : photos des temps partagés autour de la couleur, publiées avec l'accord des personnes concernées.";
$canonicalUrl = "https://chaleuretcouleur.fr/galerie.php";
$currentPage = "galerie";
$bodyClass = "page-galerie";
include __DIR__ . '/partials/header.php';

// Chaque sous-dossier de images/galerie/ est une catégorie affichée automatiquement.
// Il suffit d'y déposer des photos (jpg/jpeg/png/webp) pour qu'elles apparaissent ici.
$galerieDir = __DIR__ . '/images/galerie';
$allowedExt = ['jpg', 'jpeg', 'png', 'webp'];
$categories = [];

if (is_dir($galerieDir)) {
    $entries = scandir($galerieDir);
    $categoryFolders = array_filter($entries, function ($entry) use ($galerieDir) {
        return $entry !== '.' && $entry !== '..' && is_dir($galerieDir . '/' . $entry);
    });
    natcasesort($categoryFolders);

    foreach ($categoryFolders as $folder) {
        $photos = [];
        foreach (scandir($galerieDir . '/' . $folder) as $file) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, $allowedExt, true)) {
                $photos[] = $file;
            }
        }
        natcasesort($photos);
        if (!empty($photos)) {
            $categories[$folder] = array_values($photos);
        }
    }
}
?>

<section class="who_section layout_padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="heading_container text-center">
          <h1>Galerie</h1>
        </div>
        <p class="text-justify text-center">
          Un aperçu des visites et des ateliers, en images — publiées uniquement avec
          l'accord des personnes concernées.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="layout_padding2">
  <div class="container">
    <?php if (empty($categories)): ?>
      <div class="galerie_grid">
        <div class="galerie_empty text-center">
          <p>
            Les photos seront ajoutées ici prochainement, après accord des personnes
            photographiées ou de leurs représentants.
          </p>
        </div>
      </div>
    <?php else: ?>
      <?php foreach ($categories as $categoryName => $photos): ?>
        <div class="galerie_categorie">
          <h2 class="galerie_categorie_titre"><?= htmlspecialchars($categoryName) ?></h2>
          <div class="galerie_grid">
            <?php foreach ($photos as $photo): ?>
              <?php $src = 'images/galerie/' . rawurlencode($categoryName) . '/' . rawurlencode($photo); ?>
              <div class="galerie_item">
                <img src="<?= $src ?>" alt="<?= htmlspecialchars($categoryName) ?>" loading="lazy">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
