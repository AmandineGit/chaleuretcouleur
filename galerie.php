<?php
$pageTitle = "Galerie | Chaleur et Couleur";
$pageDescription = "Galerie de Chaleur et Couleur : photos des temps partagés autour de la couleur, publiées avec l'accord des personnes concernées.";
$canonicalUrl = "https://chaleuretcouleur.fr/galerie.php";
$currentPage = "galerie";
$bodyClass = "";
include __DIR__ . '/partials/header.php';
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
    <div class="galerie_grid">
      <!-- Les photos seront ajoutées ici une fois les autorisations de droit à
           l'image obtenues. Aucune image de test n'est utilisée en attendant. -->
      <div class="galerie_empty text-center">
        <p>
          Les photos seront ajoutées ici prochainement, après accord des personnes
          photographiées ou de leurs représentants.
        </p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
