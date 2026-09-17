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

<!-- récit -->
<section class="recit_section recit_section--meadow layout_padding">
  <div class="container recit_content">
    <div class="recit_texte_bloc">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-9 col-lg-9 text-center recit_texte_col">
          <h1 class="text-center">
            <span class="recit_texte_brun">Nous avons tous besoin d'échanger, de rire<br>et de se sentir créatifs et utiles.</span><br>
            <span class="recit_texte_corail"><span class="recit_icones_inline" aria-hidden="true">🖌️</span>La couleur comme prétexte au partage.<span class="recit_icones_inline" aria-hidden="true"><svg class="bulle-icon" viewBox="0 0 100 100" focusable="false">
                <path d="M 23.16,61.75 A 28,28 0 1,1 33.14,65.58 L 26,70.68 Z" fill="#FFFFFF" stroke-width="2" stroke-linejoin="round"/>
                <path d="M 76.72,82.35 A 24,24 0 1,0 68.17,85.63 L 74.29,90.0 Z" fill="#FFFFFF" stroke-width="2" stroke-linejoin="round"/>
              </svg>🌈</span><br class="recit_icones_saut">
              <span class="recit_icones_fin" aria-hidden="true">🖌️<svg class="bulle-icon" viewBox="0 0 100 100" focusable="false">
                <path d="M 23.16,61.75 A 28,28 0 1,1 33.14,65.58 L 26,70.68 Z" fill="#FFFFFF" stroke-width="2" stroke-linejoin="round"/>
                <path d="M 76.72,82.35 A 24,24 0 1,0 68.17,85.63 L 74.29,90.0 Z" fill="#FFFFFF" stroke-width="2" stroke-linejoin="round"/>
              </svg>🌈</span>
            </span>
          </h1>
        </div>
        <div class="col-md-3 col-lg-2 recit_logo_col">
          <img src="images/Logo-CC-v1-web.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end récit -->

<!-- teaser dominant : Présence en couleur (lien vers presence-en-couleur.php) -->
<section class="teaser_section teaser_dominant layout_padding">
  <div class="container">
    <div class="detail-box text-center">
      <h2>Présence en couleur</h2>
      <a href="presence-en-couleur.php" class="teaser_icone_badge teaser_icone_badge--mobile d-md-none">
        <img src="images/Icones/domicile-jaune.png" alt="">
      </a>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="row align-items-center teaser_ligne">
          <div class="col-md-8 text-center text-md-left">
            <p class="teaser_tagline">
              Une présence à domicile, en tête-à-tête, pour les personnes de tous âges, isolées ou non.
            </p>
            <div class="badges_service">
              <div class="carte_ligne badge_service"><p class="carte_ligne_label">À domicile</p></div>
              <div class="carte_ligne badge_service"><p class="carte_ligne_label">Juste pour vous</p></div>
              <div class="carte_ligne badge_service"><p class="carte_ligne_label">Matériel fourni</p></div>
            </div>
            <p class="teaser_accroche">Rien à réussir, juste à être là et partager ensemble. <svg class="accroche_icone" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="#4A2E1F" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5 2,5.41 4.42,3 7.5,3c1.74,0 3.41,0.81 4.5,2.08C13.09,3.81 14.76,3 16.5,3 19.58,3 22,5.41 22,8.5c0,3.77 -3.4,6.86 -8.55,11.53L12,21.35z"/></svg></p>
          </div>
          <div class="col-md-4 text-center teaser_icone_col">
            <a href="presence-en-couleur.php" class="teaser_icone_badge d-none d-md-flex">
              <img src="images/Icones/domicile-jaune.png" alt="">
            </a>
            <a href="presence-en-couleur.php" class="btn_on-hover btn_on-hover--brun-jaune">En savoir plus</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end teaser dominant -->

<!-- teaser discret : Médiation par la couleur -->
<section class="teaser_section teaser_discret layout_padding2">
  <div class="container">
    <div class="detail-box text-center">
      <h3>Médiation par la couleur</h3>
      <a href="mediation-par-la-couleur.php" class="teaser_icone_badge teaser_icone_badge--mobile d-md-none">
        <img src="images/Icones/PourTous-groupes-vert.png" alt="">
      </a>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="row align-items-center teaser_ligne">
          <div class="col-md-8 text-center text-md-left">
            <p class="teaser_tagline">
              Des temps collectifs pour s'amuser et créer ensemble, au rythme de chacun afin de trouver sa place en douceur.
            </p>
            <div class="badges_service">
              <div class="carte_ligne badge_service"><p class="carte_ligne_label">Dans vos locaux</p></div>
              <div class="carte_ligne badge_service"><p class="carte_ligne_label">En groupe</p></div>
              <div class="carte_ligne badge_service"><p class="carte_ligne_label">Matériel fourni</p></div>
            </div>
            <p class="teaser_accroche">Personne à impressionner, juste sa place à trouver. <img src="images/Icones/bienetre-brun.webp" alt="" class="accroche_icone accroche_icone--soin"></p>
          </div>
          <div class="col-md-4 text-center teaser_icone_col">
            <a href="mediation-par-la-couleur.php" class="teaser_icone_badge d-none d-md-flex">
              <img src="images/Icones/PourTous-groupes-vert.png" alt="">
            </a>
            <a href="mediation-par-la-couleur.php" class="btn_on-hover btn_on-hover--brun-vert">En savoir plus</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end teaser discret -->

</div>
<!-- end page_photo_fond -->

<?php include __DIR__ . '/partials/footer.php'; ?>
