<?php
$pageTitle = "Contact | Chaleur et Couleur";
$pageDescription = "Contactez Chaleur et Couleur pour une visite à domicile ou pour organiser un temps collectif en résidence ou en association.";
$canonicalUrl = "https://chaleuretcouleur.fr/contact.php";
$currentPage = "contact";
$bodyClass = "contact";
require_once __DIR__ . '/api/contact_token.php';
require_once __DIR__ . '/api/contact_turnstile.php';
include __DIR__ . '/partials/header.php';
?>

<div class="page_photo_fond">
<section class="contact_section layout_padding">
    <div class="container">

      <div class="heading_container">
        <h2>
          Contactez-moi
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
                      <option value="Particulier / famille">Un particulier / une famille</option>
                      <option value="Résidence senior / structure médico-sociale">Une résidence senior / structure médico-sociale</option>
                      <option value="Association">Une association</option>
                      <option value="Autre">Autre</option>
                    </select>
                  </div>
                  <div>
                    <textarea name="message" placeholder="Votre message" class="input_message" rows="4" required aria-describedby="messageHint"></textarea>
                    <small id="messageHint" class="form-text text-muted">
                      Merci de ne pas communiquer d'informations médicales, si une adaptation est nécessaire, nous en parlerons de vive voix.
                    </small>
                  </div>
                  <!-- Anti-spam : champ piège invisible pour les humains + jeton d'horodatage signé -->
                  <div style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;" aria-hidden="true">
                    <label for="website">Ne pas remplir ce champ</label>
                    <input type="text" id="website" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true">
                  </div>
                  <input type="hidden" name="form_token" value="<?= htmlspecialchars(contact_form_token()) ?>">
                  <!-- Anti-spam : vérification Cloudflare Turnstile (le plus souvent invisible) -->
                  <div class="cf-turnstile d-flex justify-content-center mb-3" data-sitekey="<?= htmlspecialchars(TURNSTILE_SITE_KEY) ?>" data-language="fr"></div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover">
                      Envoyer
                    </button>
                  </div>
                  <div id="formMessage" style="margin-top: 15px; text-align: center;"></div>
                </form>
                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
