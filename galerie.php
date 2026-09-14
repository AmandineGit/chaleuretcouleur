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

// Lit legende.txt d'une œuvre et renvoie ['captions' => [...], 'coverIndex' => N].
// - une ligne "#01 Ma phrase" correspond à l'image dont le nom commence par 01
//   (ex. "01 - Fraises.png") ; sans aucune ligne préfixée par #, le contenu du
//   fichier s'applique tel quel à toutes les photos.
// - une ligne "#Head 02" (ou "Head 02") désigne l'image 02 comme vignette de couverture (par
//   défaut, c'est la première image dans l'ordre qui sert de couverture).
function gal_parse_legendes($legendePath, $images) {
    $captions = array_fill(0, count($images), '');
    $coverIndex = 0;
    if (!is_file($legendePath)) return ['captions' => $captions, 'coverIndex' => $coverIndex];

    $numberToIndex = [];
    foreach ($images as $i => $file) {
        if (preg_match('/^0*(\d+)/', $file, $m)) {
            $numberToIndex[(int) $m[1]] = $i;
        }
    }

    $hasNumberedLine = false;
    $plainLines = [];

    $lines = preg_split('/\r\n|\r|\n/', file_get_contents($legendePath));
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') continue;

        if (preg_match('/^#?head\s+0*(\d+)\s*$/i', $line, $m)) {
            $num = (int) $m[1];
            if (isset($numberToIndex[$num])) {
                $coverIndex = $numberToIndex[$num];
            }
        } elseif (preg_match('/^#0*(\d+)\s*(.*)$/', $line, $m)) {
            $hasNumberedLine = true;
            $num = (int) $m[1];
            if (isset($numberToIndex[$num])) {
                $captions[$numberToIndex[$num]] = trim($m[2]);
            }
        } else {
            $plainLines[] = $line;
        }
    }

    if (!$hasNumberedLine && !empty($plainLines)) {
        $captions = array_fill(0, count($images), implode(' ', $plainLines));
    }

    return ['captions' => $captions, 'coverIndex' => $coverIndex];
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
                $images = array_values($images);

                $parsed = gal_parse_legendes($entryPath . '/legende.txt', $images);

                $oeuvres[] = [
                    'photos' => array_map(function ($file) use ($categoryName, $entry) {
                        return 'images/galerie/' . rawurlencode($categoryName) . '/' . rawurlencode($entry) . '/' . rawurlencode($file);
                    }, $images),
                    'legendes' => $parsed['captions'],
                    'coverIndex' => $parsed['coverIndex'],
                ];
            } elseif (gal_is_image($entry, $allowedExt)) {
                // Photo posée directement dans la catégorie : œuvre à une seule image
                $oeuvres[] = [
                    'photos' => ['images/galerie/' . rawurlencode($categoryName) . '/' . rawurlencode($entry)],
                    'legendes' => [''],
                    'coverIndex' => 0,
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
              <?php
                $coverIndex = $oeuvre['coverIndex'] ?? 0;
                $coverLegende = $oeuvre['legendes'][$coverIndex] ?? '';
              ?>
              <div class="galerie_item">
                <img
                  src="<?= htmlspecialchars($oeuvre['photos'][$coverIndex]) ?>"
                  alt="<?= htmlspecialchars($coverLegende !== '' ? $coverLegende : $categoryName) ?>"
                  loading="lazy"
                  class="galerie_photo"
                  data-photos="<?= htmlspecialchars(json_encode($oeuvre['photos']), ENT_QUOTES) ?>"
                  data-legendes="<?= htmlspecialchars(json_encode($oeuvre['legendes']), ENT_QUOTES) ?>"
                  data-cover-index="<?= (int) $coverIndex ?>"
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
