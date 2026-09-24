<?php
// Accueil : variante "arbre" (fond photo pleine page).
$pageTitle = "Chaleur et Couleur – Présence et créativité contre l'isolement";
$pageDescription = "Chaleur et Couleur accompagne les personnes isolées ou âgées par la couleur : des visites à domicile en tête-à-tête et des temps collectifs en résidence ou en association.";
$canonicalUrl = "https://chaleuretcouleur.fr/";
$currentPage = "accueil";
$bodyClass = "accueil accueil2";

include __DIR__ . '/partials/header.php';
?>

<!-- Fond photo unique pour tout le contenu (hors footer) : l'arbre continue
     derrière l'intro et les deux bandeaux, qui deviennent semi-transparents. -->
<div class="page_photo_fond">

<!-- bandeau orange : Retour à la couleur (texte d'intro personnel) -->
<section class="teaser_section teaser_intro_section layout_padding2">
  <div class="container">
    <div class="teaser_intro teaser_split_col">
      <div class="teaser_intro_grid">
        <div class="teaser_intro_grid_text">
          <div class="detail-box text-center">
            <h1>Retour à la couleur <br class="d-md-none">🖌️🌈<span class="sr-only">, ateliers créatifs pour vaincre l'isolement</span></h1>
          </div>
          <?php /* Bloc corail masqué (gardé au cas où) : retirer ce commentaire PHP pour le réafficher.
          <div class="teaser_intro_texte">
            <p>
              <span class="teaser_intro_texte_mobile_centre">Faire revenir la couleur et la créativité dans nos vies, comme un prétexte pour <strong>partager du temps et créer ensemble.</strong></span>
            </p>
          </div>
          */ ?>
        </div>
        <div class="teaser_intro_logo_col">
          <img src="images/Logo-CC-v1-web.png" alt="">
        </div>
        <div class="teaser_intro_grid_button text-center">
          <p class="teaser_intro_h1 text-center">
            Car nous avons tous besoin d'échanger, de rire et de se sentir créatifs et utiles.
          </p>
          <a href="qui-suis-je.php" class="btn_on-hover btn_on-hover--arc-en-ciel">Découvrir la démarche <span class="d-none d-md-inline">· </span><br class="d-md-none">Retour à la couleur</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end bandeau orange -->

<!-- teasers côte à côte : Présence en couleur (jaune) + Médiation par la couleur (vert) -->
<section class="teaser_section teaser_split layout_padding">
  <div class="container">
    <div class="row justify-content-center teaser_split_row">

      <div class="col-md-6">
        <div class="teaser_dominant teaser_split_col">
          <div class="detail-box text-center">
            <h2>Présence en couleur</h2>
          </div>
          <p class="teaser_tagline">
            Une présence à domicile, en tête-à-tête, pour les personnes de tous âges, isolées ou non.
          </p>
          <div class="badges_service">
            <div class="carte_ligne badge_service"><p class="carte_ligne_label">À domicile</p></div>
            <div class="carte_ligne badge_service"><p class="carte_ligne_label">Juste pour vous</p></div>
            <div class="carte_ligne badge_service"><p class="carte_ligne_label">Matériel fourni</p></div>
          </div>
          <p class="teaser_accroche">Rien à réussir, juste à être là et partager ensemble. <svg class="accroche_icone" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="#4A2E1F" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5 2,5.41 4.42,3 7.5,3c1.74,0 3.41,0.81 4.5,2.08C13.09,3.81 14.76,3 16.5,3 19.58,3 22,5.41 22,8.5c0,3.77 -3.4,6.86 -8.55,11.53L12,21.35z"/></svg></p>
          <div class="teaser_icone_col">
            <a href="presence-en-couleur.php" class="teaser_icone_badge">
              <img src="images/Icones/domicile-jaune.png" alt="">
            </a>
            <a href="presence-en-couleur.php" class="btn_on-hover btn_on-hover--brun-jaune">En savoir plus</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="teaser_discret teaser_split_col">
          <div class="detail-box text-center">
            <h3>Médiation par la couleur</h3>
          </div>
          <p class="teaser_tagline">
            Des temps collectifs pour s'amuser et créer ensemble, au rythme de chacun afin de trouver sa place en douceur.
          </p>
          <div class="badges_service">
            <div class="carte_ligne badge_service"><p class="carte_ligne_label">Dans vos locaux</p></div>
            <div class="carte_ligne badge_service"><p class="carte_ligne_label">En groupe</p></div>
            <div class="carte_ligne badge_service"><p class="carte_ligne_label">Matériel fourni</p></div>
          </div>
          <p class="teaser_accroche">Personne à impressionner, juste sa place à trouver. <img src="images/Icones/bienetre-brun.webp" alt="" class="accroche_icone accroche_icone--soin"></p>
          <div class="teaser_icone_col">
            <a href="mediation-par-la-couleur.php" class="teaser_icone_badge">
              <img src="images/Icones/PourTous-groupes-vert.png" alt="">
            </a>
            <a href="mediation-par-la-couleur.php" class="btn_on-hover btn_on-hover--brun-vert">En savoir plus</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- end teasers côte à côte -->

<!-- Comble l'espace laissé par le footer collé en bas sur les grands écrans :
     le calque blanc de lisibilité de toute la page (voir
     body.accueil2 .page_photo_fond::before) couvre déjà cette zone. -->
<div class="page_photo_fond_filler" aria-hidden="true"></div>

</div>
<!-- end page_photo_fond -->

<?php include __DIR__ . '/partials/footer.php'; ?>
