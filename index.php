<?php
$pageTitle = "Digital Pragma – Coaching et ateliers collectifs pour organisations";
$pageDescription = "Digital Pragma accompagne entrepreneurs, dirigeants et équipes grâce au coaching individuel et à des ateliers collectifs : médiation créative, agilité, sensibilisation RGPD, cybersécurité, IA Act.";
$canonicalUrl = "https://digital-pragma.fr/";
$currentPage = "accueil";
$logoVariant = "corail";
$bodyClass = "accueil";
include __DIR__ . '/partials/header.php';
?>

<!-- slider section -->
<section class="slider_section position-relative">
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row">
            <div class="col">
              <div class="detail-box">
                <div>
                  <h2>Un accompagnement humain et pragmatique</h2>
                  <h1>Coaching & ateliers collectifs</h1>
                  <p>
                    Digital Pragma accompagne les organisations : les solutions <br>
                    naissent chez vous, avec vous, pas dans un rapport.
                  </p>
                  <div>
                    <a href="contact.php">Contactez-nous</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="row">
            <div class="col">
              <div class="detail-box">
                <div>
                  <h1>Coaching individuel</h1>
                  <p>
                    Pour entrepreneurs, dirigeants et managers en quête <br>
                    de clarté, de recul et d'une posture plus juste.
                  </p>
                  <div>
                    <a href="offres.php">Découvrir le coaching</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <div class="row">
            <div class="col">
              <div class="detail-box">
                <div>
                  <h1>Ateliers collectifs</h1>
                  <p>
                  Médiation créative, ateliers agiles, sensibilisation RGPD, cybersécurité, IA Act.
                  </p>
                  <div>
                    <a href="offres.php">Découvrir les ateliers</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- /.carousel-inner -->
      <!-- Contrôles gauche / droite -->
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
      </a>
    </div> <!-- /#carouselExampleIndicators -->
  </div> <!-- /.container -->
</section>
<!-- end slider section -->

<!-- do section -->
<section class="do_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>Deux façons de vous accompagner</h2>
      <p>
        Un accompagnement individuel ou collectif, toujours construit avec les
        personnes concernées.
      </p>
    </div>
    <div class="do_container">
      <div class="box arrow-start">
        <div class="img-box">
          <a href="offres.php" class="img-box"><img src="images/d-5.png" alt="Coaching individuel"></a>
        </div>
        <div class="detail-box">
          <h6>Coaching individuel</h6>
        </div>
      </div>
      <div class="box arrow-end">
        <div class="img-box">
          <a href="offres.php" class="img-box"><img src="images/d-2.png" alt="Ateliers collectifs"></a>
        </div>
        <div class="detail-box">
          <h6>Ateliers collectifs</h6>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end do section -->

<!-- who section -->
<section class="who_section">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="img-box">
          <img src="images/AteliersV2.png"
               alt="Illustration d'ateliers collectifs Digital Pragma">
        </div>
      </div>
      <div class="col-md-7">
        <div class="detail-box">
          <div class="heading_container">
            <h2>Digital Pragma, c'est quoi ?</h2>
          </div>
          <p class="text-justify">
            Un accompagnement humain et organisationnel pour les entrepreneurs,
            dirigeants, managers et équipes qui veulent avancer.<br><br>
            Nous ne livrons pas de diagnostic tout fait : le constat et les solutions
            émergent des personnes elles-mêmes, salariés et managers, que nous aidons
            à faire émerger et à structurer.<br><br>
            Deux formats pour ça : le coaching individuel, pour cheminer à votre
            rythme, et les ateliers collectifs — médiation créative, agilité,
            sensibilisation RGPD, cybersécurité, IA Act — pour faire avancer une
            équipe ensemble.<br><br>
            Si vous avez un besoin en tête, ou souhaitez simplement en discuter
            autour d’un café, en local ou en visio, contactez-nous !
          </p>
          <div class="text-center">
            <a href="apropos.php" class="btn_on-hover">En savoir plus</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end who section -->


<!-- work section -->
<section class="work_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-5 d-flex align-items-center">
        <div class="detail-box">
          <div class="heading_container">
            <h2>Se former en autonomie</h2>
          </div>
          <p class="text-justify">
            En complément du coaching et des ateliers, retrouvez nos parcours de
            sensibilisation en libre accès sur ShakeYourBrain, notre plateforme de
            formation gratuite et ouverte à tous.<br><br>
            Une ressource pour continuer à progresser à votre rythme, entre deux
            séances d'accompagnement.
          </p>
          <div class="text-center">
            <a href="ressources.php" class="btn_on-hover">En savoir plus</a>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="img-box">
          <img src="images/Digital-Student.png" class="d-block mx-auto"
               alt="Digital Pragma aide à atteindre vos objectifs">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end work section -->


<!-- client section -->
<section class="client_section">
  <div class="container">
    <div class="heading_container">
      <h2>Ce que disent nos clients</h2>
    </div>
    <div class="carousel-wrap">
      <div class="owl-carousel">
        <!-- témoignage 1 -->
        <div class="item">
          <div class="box">
            <div class="detail-box">
              <h5>
                Gérard Némitz<br>
                <span>- Consultant sénior SI -</span>
              </h5>
              <img src="images/quote.png" alt="">
              <p class="text-justify">
                J'ai croisé Amandine à 2 reprises dans des contextes de missions différents.
                Elle a su à chaque fois prendre la mesure des missions et faire l'unanimité
                en utilisant et en partageant toutes ses compétences.
              </p>
            </div>
          </div>
        </div>
        <!-- témoignage 2 -->
        <div class="item">
          <div class="box">
            <div class="detail-box">
              <h5>
                Bernard Mikolajczak<br>
                <span>- IT Service Relationship Manager Kingfisher plc -</span>
              </h5>
              <img src="images/quote.png" alt="">
              <p class="text-justify">
                Manager des process ITIL Change et Fournisseurs chez Kingfisher IT Services pendant 3 ans.
                Amandine a parfaitement accompli sa mission : rigoureuse, tenace et disponible.
              </p>
            </div>
          </div>
        </div>
        <!-- témoignage 3 -->
        <div class="item">
          <div class="box">
            <div class="detail-box">
              <h5>
                Peter Gerritsen<br>
                <span>- Coach'sultant @ Pepper Group and Parthenus -</span>
              </h5>
              <img src="images/quote.png" alt="">
              <p class="text-justify">
                Excellente formatrice, pédagogue et innovante. Les clients et stagiaires
                étaient toujours ravis de ses interventions.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end client section -->


<!-- target section -->
<section class="target_section layout_padding2">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="detail-box">
          <h2>700+</h2>
          <h5>Missions réalisées</h5>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="detail-box">
          <h2>Secteurs variés</h2>
          <h5>Industrie, finance, commerce, tourisme, santé, éducation...</h5>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="detail-box">
          <h2>100%</h2>
          <h5>Clients satisfaits</h5>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end target section -->

<?php include __DIR__ . '/partials/footer.php'; ?>
