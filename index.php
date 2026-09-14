<?php
$pageTitle = "Chaleur et Couleur – Présence et créativité contre l'isolement";
$pageDescription = "Chaleur et Couleur accompagne les personnes isolées ou âgées par la couleur : des visites à domicile en tête-à-tête et des temps collectifs en résidence ou en association.";
$canonicalUrl = "https://chaleuretcouleur.fr/";
$currentPage = "accueil";
$bodyClass = "accueil";
include __DIR__ . '/partials/header.php';
?>

<!-- récit -->
<section class="recit_section layout_padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 text-center">
        <h1>La couleur comme prétexte pour venir, s'asseoir, et parler <span aria-hidden="true">🖌️🌈</span></h1>
        <p class="text-justify mt-4">
          Chaleur et Couleur est née d'un constat simple : beaucoup de personnes, chez
          elles ou en résidence, passent des journées entières sans visite ni échange.
          La couleur n'est ici qu'un prétexte — un fil pour tenir une heure de présence,
          d'attention et de conversation, sans rien attendre de plus.
        </p>
        <p class="text-justify">
          Pas de résultat à produire, pas de talent requis : juste un moment partagé, à
          son rythme, où poser des couleurs sur une page devient une façon d'être
          ensemble et de rompre la solitude du quotidien.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- end récit -->

<!-- teaser dominant : Retour à la couleur -->
<section class="teaser_section teaser_dominant layout_padding">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="detail-box text-center">
          <h2>Retour à la couleur</h2>
          <p class="teaser_tagline">
            Une présence à domicile, en tête-à-tête, pour les personnes isolées ou âgées.
          </p>
          <a href="retour-a-la-couleur.php" class="btn_on-hover">En savoir plus</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end teaser dominant -->

<!-- teaser discret : Médiation par la couleur -->
<section class="teaser_section teaser_discret layout_padding2">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="detail-box text-center">
          <h3>Médiation par la couleur</h3>
          <p class="teaser_tagline">
            Des temps collectifs en résidence senior ou en association, pour créer du
            lien à plusieurs.
          </p>
          <a href="mediation-par-la-couleur.php" class="btn_on-hover">En savoir plus</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end teaser discret -->

<?php include __DIR__ . '/partials/footer.php'; ?>
