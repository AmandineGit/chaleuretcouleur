<?php
$pageTitle = "Retour à la couleur | Chaleur et Couleur";
$pageDescription = "La démarche Chaleur et Couleur : faire revenir la couleur et la créativité dans nos vies, comme un prétexte pour partager du temps et créer ensemble.";
$canonicalUrl = "https://chaleuretcouleur.fr/retour-a-la-couleur.php";
$currentPage = "retour-a-la-couleur";
$bodyClass = "page-retour-couleur";
include __DIR__ . '/partials/header.php';
?>

<section class="who_section layout_padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="heading_container text-center">
          <h1>Retour à la couleur</h1>
        </div>
        <p class="text-justify">
          Chaleur et Couleur est née de cette envie : faire revenir la couleur et la
          créativité dans nos vies, non pas comme une
          performance à réussir, mais comme un prétexte pour partager du temps et des
          envies créatives ensemble.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="retour_bande retour_bande--bienfaits layout_padding2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text-center">
          <button type="button" class="retour_bande_toggle" aria-controls="bande-bienfaits"><span class="retour_bande_titre">Les bienfaits essentiels</span></button>
        </h2>
        <div id="bande-bienfaits" class="retour_bande_contenu">

          <div class="row bienfaits_row">
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/Bienfaits1.webp') ?>" alt="Un homme âgé souriant, pinceau à la main, concentré sur sa peinture" class="bienfait_photo" loading="lazy" width="1076" height="800">
                <h3>S’apaiser et retrouver du plaisir</h3>
                <ul class="bienfait_liste">
                  <li>Les gestes simples recentrent l’attention sur l’instant présent.</li>
                  <li>La créativité ouvre une parenthèse de couleur et de légèreté dans la journée.</li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/Bienfaits2.webp') ?>" alt="Une main qui peint à grands coups de pinceau une toile aux couleurs vives" class="bienfait_photo" loading="lazy" width="1076" height="800">
                <h3>S’exprimer autrement</h3>
                <ul class="bienfait_liste">
                  <li>Le dessin, la peinture ou le collage permettent de dire les choses sans passer par les mots.</li>
                  <li>Créer donne une place aux émotions, librement, à son rythme.</li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/Bienfaits3.webp') ?>" alt="Une femme souriante qui se regarde dans le miroir, l’air fière d’elle" class="bienfait_photo bienfait_photo--eclaircie" loading="lazy" width="1076" height="800">
                <h3>Renforcer l’estime de soi</h3>
                <ul class="bienfait_liste">
                  <li>Des réalisations accessibles redonnent confiance en ses capacités.</li>
                  <li>Les créations se montrent et se racontent : on a de nouveau quelque chose à offrir et à partager avec les autres.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="retour_bande retour_bande--approche layout_padding2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text-center">
          <button type="button" class="retour_bande_toggle" aria-controls="bande-approche"><span class="retour_bande_titre">Une approche humaine</span></button>
        </h2>
        <div id="bande-approche" class="retour_bande_contenu">

          <div class="row bienfaits_row">
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/ApprocheHumaine1.webp') ?>" alt="Deux personnes face à face, mains ouvertes l’une vers l’autre sur une table, une tasse de thé fumante en arrière-plan" class="bienfait_photo bienfait_photo--rond" loading="lazy" width="800" height="800">
                <h3>Écouter et reformuler</h3>
                <ul class="bienfait_liste">
                  <li>La Communication Non Violente aide à entendre les besoins derrière les mots.</li>
                  <li>La reformulation permet de se sentir compris, sans être pressé.</li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/ApprocheHumaine2.webp') ?>" alt="Deux personnes tenant ensemble une feuille avec quelques traces de couleur" class="bienfait_photo bienfait_photo--rond" loading="lazy" width="800" height="800">
                <h3>Créer du lien, sans comparaison</h3>
                <ul class="bienfait_liste">
                  <li>L’atelier est avant tout un espace de présence et de relation.</li>
                  <li>La création est un support simple pour échanger : chacun avance à sa façon, l’essentiel est le plaisir d’être ensemble.</li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/ApprocheHumaine3.webp') ?>" alt="Un fauteuil douillet avec un plaid près d’une fenêtre lumineuse, une plante posée à côté" class="bienfait_photo bienfait_photo--rond" loading="lazy" width="800" height="800">
                <h3>Poser un cadre sécurisant</h3>
                <ul class="bienfait_liste">
                  <li>Chaque rencontre se vit avec bienveillance, authenticité et ouverture.</li>
                  <li>L’atelier vient à chacun, dans un univers qui est le sien.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="retour_bande retour_bande--effets layout_padding2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="text-center">
          <button type="button" class="retour_bande_toggle" aria-controls="bande-effets"><span class="retour_bande_titre">Des effets concrets</span></button>
        </h2>
        <div id="bande-effets" class="retour_bande_contenu">

          <div class="row justify-content-center bienfaits_row">
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/Effets1.webp') ?>" alt="Une danseuse à genoux, bras levé vers le ciel, au milieu d’un nuage de poudre blanche" class="bienfait_photo" loading="lazy" width="1076" height="800">
                <p>Rompre l’ennui au quotidien et remettre du mouvement dans la vie.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bienfait">
                <img src="<?= $cssVersion('images/Effets2.webp') ?>" alt="Plusieurs mains qui se tiennent par les poignets pour former un cercle, en plein air" class="bienfait_photo" loading="lazy" width="1076" height="800">
                <p>Recréer du lien social, se sentir écouté et exister à nouveau, pour retrouver sa place, pas à pas.</p>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-10">
              <h3 class="etudes_titre text-center">Ce qu’en disent les études…</h3>

              <div class="cartes_lignes">
                <div class="carte_ligne carte_ligne--benefice">
                  <div class="benefice_icone benefice_icone--grande">
                    <img src="images/Icones/solitude-ennui-blanc.png" alt="">
                  </div>
                  <div class="benefice_texte">
                    <h4>Réduction de l'isolement social</h4>
                    <p>
                      Une étude de l'Institut universitaire de gériatrie de Montréal,
                      publiée en 2022 dans
                      <em>Frontiers in Medicine</em> et menée auprès de 106 personnes âgées
                      isolées, a montré une diminution significative du sentiment
                      d'isolement après plusieurs semaines d'ateliers en petit groupe,
                      ainsi qu'un renforcement du sentiment d'appartenance.
                    </p>
                    <p class="benefices_sources small text-muted">
                      Source : Beauchet, O. et al. (2022), <em>Frontiers in Medicine</em>, DOI
                      <a href="https://doi.org/10.3389/fmed.2022.969122" target="_blank" rel="noopener noreferrer">10.3389/fmed.2022.969122</a>
                    </p>
                  </div>
                </div>
                <div class="carte_ligne carte_ligne--benefice">
                  <div class="benefice_icone benefice_icone--tres-grande">
                    <img src="images/Icones/Joie-mouvement-vie-blanc.png" alt="">
                  </div>
                  <div class="benefice_texte">
                    <h4>Amélioration de l'activité physique</h4>
                    <p>
                      Une étude de la même équipe, publiée en 2023 dans
                      <em>European Geriatric Medicine</em>, a mesuré une amélioration
                      de l'activité physique de seniors ayant participé à des ateliers
                      de création artistique en groupe.
                    </p>
                    <p class="benefices_sources small text-muted">
                      Source : Planta, O. et al. (2023), <em>European Geriatric Medicine</em>, DOI
                      <a href="https://doi.org/10.1007/s41999-023-00831-9" target="_blank" rel="noopener noreferrer">10.1007/s41999-023-00831-9</a>
                    </p>
                  </div>
                </div>
                <div class="carte_ligne carte_ligne--benefice">
                  <div class="benefice_icone">
                    <img src="images/Icones/estime-grandir-confiance-blanc.png" alt="">
                  </div>
                  <div class="benefice_texte">
                    <h4>Effet positif sur le moral et l'engagement social</h4>
                    <p>
                      Une étude publiée en 2019 dans <em>The British Journal of
                      Psychiatry</em>, menée sur 10 ans auprès de plus de 2 000 personnes, relie
                      l'engagement culturel et créatif régulier chez les seniors à un
                      risque réduit de développer une dépression.
                    </p>
                    <p class="benefices_sources small text-muted">
                      Source : Fancourt, D. &amp; Tymoszuk, U. (2019), <em>The British Journal of Psychiatry</em>, DOI
                      <a href="https://doi.org/10.1192/bjp.2018.267" target="_blank" rel="noopener noreferrer">10.1192/bjp.2018.267</a>
                    </p>
                  </div>
                </div>
                <div class="carte_ligne carte_ligne--benefice">
                  <div class="benefice_icone">
                    <img src="images/Icones/bien-etre-blanc.png" alt="">
                  </div>
                  <div class="benefice_texte">
                    <h4>Un axe reconnu de santé publique</h4>
                    <p>
                      L'Organisation mondiale de la santé identifie la création
                      d'environnements sociaux favorables comme un levier central de la
                      santé mentale des personnes âgées.
                    </p>
                    <p class="benefices_sources small text-muted">
                      Source : OMS,
                      <a href="https://www.who.int/fr/news-room/fact-sheets/detail/mental-health-of-older-adults" target="_blank" rel="noopener noreferrer">« Santé mentale des personnes âgées »</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="retour_cta layout_padding2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="text-center qui-suis-je_cta">
          <a href="presence-en-couleur.php" class="btn_on-hover btn_on-hover--jaune">Découvrir Présence en couleur →</a>
          <a href="mediation-par-la-couleur.php" class="btn_on-hover btn_on-hover--vert">Découvrir Médiation par la couleur →</a>
        </div>
        <p class="text-center retour_cta_lien">
          Envie d’en savoir plus sur moi ? <a href="qui-suis-je.php">Qui suis-je</a>
        </p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
