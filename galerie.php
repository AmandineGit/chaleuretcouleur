<?php
$pageTitle = "Galerie | Chaleur et Couleur";
$pageDescription = "Galerie de Chaleur et Couleur : photos des temps partagés autour de la couleur, publiées avec l'accord des personnes concernées.";
$canonicalUrl = "https://chaleuretcouleur.fr/galerie.php";
$currentPage = "galerie";
$bodyClass = "page-galerie";
include __DIR__ . '/partials/header.php';

// Structure de images/galerie/ :
//   <catégorie>/<œuvre>/01-xxx.jpg, 02-xxx.jpg, ... + legende.txt (optionnel)
//   <catégorie>/photo-seule.jpg  (une image posée directement = une "œuvre" à une seule photo)
// La première image (ordre alphabétique, d'où l'intérêt des préfixes 01-, 02-...) sert de
// vignette ; les suivantes défilent dans la modale avec les flèches, en boucle.
$galerieDir = __DIR__ . '/images/galerie';
$allowedExt = ['jpg', 'jpeg', 'png', 'webp'];
$categories = [];

function gal_is_image($file, $allowedExt) {
    return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), $allowedExt, true);
}

if (is_dir($galerieDir)) {
    $categoryFolders = array_filter(scandir($galerieDir), function ($entry) use ($galerieDir) {
        return $entry !== '.' && $entry !== '..' && is_dir($galerieDir . '/' . $entry);
    });
    natcasesort($categoryFolders);

    foreach ($categoryFolders as $categoryName) {
        $categoryPath = $galerieDir . '/' . $categoryName;
        $oeuvres = [];

        $entries = scandir($categoryPath);
        natcasesort($entries);

        foreach ($entries as $entry) {
            if ($entry === '.' || $entry === '..') continue;
            $entryPath = $categoryPath . '/' . $entry;

            if (is_dir($entryPath)) {
                // Dossier-œuvre : plusieurs images + légende optionnelle
                $images = [];
                foreach (scandir($entryPath) as $file) {
                    if (gal_is_image($file, $allowedExt)) {
                        $images[] = $file;
                    }
                }
                natcasesort($images);
                if (empty($images)) continue;

                $legende = '';
                $legendePath = $entryPath . '/legende.txt';
                if (is_file($legendePath)) {
                    $legende = trim(file_get_contents($legendePath));
                }

                $oeuvres[] = [
                    'photos' => array_map(function ($file) use ($categoryName, $entry) {
                        return 'images/galerie/' . rawurlencode($categoryName) . '/' . rawurlencode($entry) . '/' . rawurlencode($file);
                    }, array_values($images)),
                    'legende' => $legende,
                ];
            } elseif (gal_is_image($entry, $allowedExt)) {
                // Photo posée directement dans la catégorie : œuvre à une seule image
                $oeuvres[] = [
                    'photos' => ['images/galerie/' . rawurlencode($categoryName) . '/' . rawurlencode($entry)],
                    'legende' => '',
                ];
            }
        }

        if (!empty($oeuvres)) {
            $categories[$categoryName] = $oeuvres;
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
      <?php foreach ($categories as $categoryName => $oeuvres): ?>
        <div class="galerie_categorie">
          <h2 class="galerie_categorie_titre"><?= htmlspecialchars($categoryName) ?></h2>
          <div class="galerie_grid">
            <?php foreach ($oeuvres as $oeuvre): ?>
              <div class="galerie_item">
                <img
                  src="<?= htmlspecialchars($oeuvre['photos'][0]) ?>"
                  alt="<?= htmlspecialchars($oeuvre['legende'] !== '' ? $oeuvre['legende'] : $categoryName) ?>"
                  loading="lazy"
                  class="galerie_photo"
                  data-photos="<?= htmlspecialchars(json_encode($oeuvre['photos']), ENT_QUOTES) ?>"
                  data-legende="<?= htmlspecialchars($oeuvre['legende']) ?>"
                >
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<!-- Modale d'affichage plein format -->
<div id="galerieModal" class="galerie-modal">
  <span class="galerie-modal-close">&times;</span>
  <button class="galerie-modal-nav galerie-modal-prev" aria-label="Image précédente">&#8249;</button>
  <button class="galerie-modal-nav galerie-modal-next" aria-label="Image suivante">&#8250;</button>
  <div class="galerie-modal-content">
    <img id="galerieModalImg" src="" alt="">
    <p id="galerieModalLegende" class="galerie-modal-legende"></p>
  </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
