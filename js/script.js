// js/script.js

document.addEventListener('DOMContentLoaded', () => {
  initContactForm();
  initGalerieModal();
});

/**
 * Modale d'affichage plein format pour la galerie, avec navigation
 * en boucle entre les images d'une même œuvre (processus de création)
 */
function initGalerieModal() {
  const modal = document.getElementById('galerieModal');
  if (!modal) return; // La modale n'existe que sur la page galerie

  const modalImg = document.getElementById('galerieModalImg');
  const modalLegende = document.getElementById('galerieModalLegende');
  const closeBtn = modal.querySelector('.galerie-modal-close');
  const prevBtn = modal.querySelector('.galerie-modal-prev');
  const nextBtn = modal.querySelector('.galerie-modal-next');

  let currentPhotos = [];
  let currentLegendes = [];
  let currentIndex = 0;

  function showCurrent() {
    modalImg.src = currentPhotos[currentIndex];
    const hasMultiple = currentPhotos.length > 1;
    prevBtn.style.display = hasMultiple ? 'flex' : 'none';
    nextBtn.style.display = hasMultiple ? 'flex' : 'none';
    const legende = currentLegendes[currentIndex] || '';
    modalLegende.textContent = legende;
    modalLegende.style.display = legende ? 'block' : 'none';
  }

  function openModal(photo) {
    currentPhotos = JSON.parse(photo.dataset.photos || '[]');
    currentLegendes = JSON.parse(photo.dataset.legendes || '[]');
    currentIndex = 0;
    showCurrent();
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('show');
    document.body.style.overflow = '';
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + currentPhotos.length) % currentPhotos.length;
    showCurrent();
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % currentPhotos.length;
    showCurrent();
  }

  document.querySelectorAll('.galerie_photo').forEach(photo => {
    photo.addEventListener('click', () => openModal(photo));
  });

  closeBtn.addEventListener('click', closeModal);
  prevBtn.addEventListener('click', showPrev);
  nextBtn.addEventListener('click', showNext);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if (!modal.classList.contains('show')) return;
    if (e.key === 'Escape') closeModal();
    else if (e.key === 'ArrowLeft') showPrev();
    else if (e.key === 'ArrowRight') showNext();
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
