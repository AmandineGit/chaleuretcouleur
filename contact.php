<?php
$pageTitle = "Digital Pragma – Contact";
$pageDescription = "Contactez Digital Pragma pour discuter d'un coaching individuel ou d'un atelier collectif.";
$canonicalUrl = "https://digital-pragma.fr/contact.php";
$currentPage = "contact";
$logoVariant = "corail";
$bodyClass = "";
include __DIR__ . '/partials/header.php';
?>

<section class="contact_section layout_padding">
    <div class="container">

      <div class="heading_container">
        <h2>
          Contactez-nous
        </h2>
      </div>
      <div class="">
        <div class="">
          <div class="row">
            <div class="col-md-9 mx-auto">
              <div class="contact-form">
                <form id="contactForm">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" name="lastname" placeholder="Nom" required>
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="firstname" placeholder="Prénom" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="email" name="email" placeholder="Adresse email" required>
                    </div>
                    <div class="col-md-6">
                      <input type="tel" name="phone" placeholder="Coordonnées téléphoniques" required>
                    </div>
                  </div>
                  <div>
                    <select name="position" required>
                      <option value="" disabled selected>Vous êtes...</option>
                      <option value="Artisan / Commercant">Artisan / Commercant</option>
                      <option value="Dirigeant (CEO, DG, Gérant)">Dirigeant (CEO, DG, Gérant)</option>
                      <option value="Manager / Responsable d'équipe">Manager / Responsable d'équipe</option>
                      <option value="RH / Responsable RH">RH / Responsable RH</option>
                      <option value="Salarié (participant à un atelier)">Salarié (participant à un atelier)</option>
                      <option value="Collectivité / Association">Collectivité / Association</option>
                      <option value="Autre">Autre</option>
                    </select>
                  </div>
                  <div>
                    <textarea name="message" placeholder="Votre message" class="input_message" rows="4" required></textarea>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover">
                      Envoyer
                    </button>
                  </div>
                  <div id="formMessage" style="margin-top: 15px; text-align: center;"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="map_img-box">
        <img src="images/DigipraTech.png" alt="">
      </div>
    </div>
  </section>

<?php include __DIR__ . '/partials/footer.php'; ?>
