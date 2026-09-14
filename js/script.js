// js/script.js

document.addEventListener('DOMContentLoaded', () => {
  initContactForm();
  initGalerieModal();
});

/**
 * Modale d'affichage plein format pour la galerie
 */
function initGalerieModal() {
  const modal = document.getElementById('galerieModal');
  if (!modal) return; // La modale n'existe que sur la page galerie

  const modalImg = document.getElementById('galerieModalImg');
  const closeBtn = modal.querySelector('.galerie-modal-close');

  function openModal(photo) {
    modalImg.src = photo.src;
    modalImg.alt = photo.alt;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('show');
    document.body.style.overflow = '';
  }

  document.querySelectorAll('.galerie_photo').forEach(photo => {
    photo.addEventListener('click', () => openModal(photo));
  });

  closeBtn.addEventListener('click', closeModal);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('show')) closeModal();
  });
}

/**
 * Gestion du formulaire de contact
 */
function initContactForm() {
  const form = document.getElementById('contactForm');
  if (!form) return; // Le formulaire n'existe que sur la page contact

  form.addEventListener('submit', async function(e) {
    e.preventDefault();

    const formMessage = document.getElementById('formMessage');
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.textContent;

    // Désactiver le bouton et afficher un message de chargement
    submitBtn.disabled = true;
    submitBtn.textContent = 'Envoi en cours...';
    formMessage.innerHTML = '';

    // Récupérer les données du formulaire
    const formData = new FormData(form);

    // Convertir FormData en objet JSON pour n8n
    const data = {
      lastname: formData.get('lastname'),
      firstname: formData.get('firstname'),
      email: formData.get('email'),
      phone: formData.get('phone'),
      position: formData.get('position'),
      message: formData.get('message')
    };

    try {
      // Envoyer les données vers le proxy PHP (qui gère l'authentification n8n)
      const response = await fetch('/api/contact_proxy.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      });

      const result = await response.json();

      if (result.success) {
        // Succès
        formMessage.innerHTML = '<p style="color: #28a745; font-weight: bold;">' + result.message + '</p>';
        form.reset(); // Réinitialiser le formulaire
      } else {
        // Erreur avec message détaillé
        let errorMsg = result.message;
        if (result.errors && result.errors.length > 0) {
          errorMsg += '<br><small>' + result.errors.join('<br>') + '</small>';
        }
        formMessage.innerHTML = '<p style="color: #dc3545; font-weight: bold;">' + errorMsg + '</p>';
      }
    } catch (error) {
      // Erreur réseau ou autre
      formMessage.innerHTML = '<p style="color: #dc3545; font-weight: bold;">Une erreur est survenue. Veuillez réessayer plus tard.</p>';
      console.error('Erreur:', error);
    } finally {
      // Réactiver le bouton
      submitBtn.disabled = false;
      submitBtn.textContent = originalBtnText;
    }
  });
}
