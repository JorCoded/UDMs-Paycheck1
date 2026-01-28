document.addEventListener('DOMContentLoaded', () => {
  const visionBtn = document.getElementById('vision-item');

  const visionModal = document.createElement('div');
  visionModal.id = 'visionModal';
  visionModal.classList.add('popup-modal');
  document.body.appendChild(visionModal);

  if (visionBtn && visionModal) {
    visionBtn.addEventListener('click', () => {
      fetch('vision.php')
        .then(res => res.text())
        .then(html => {
          visionModal.innerHTML = html;

          requestAnimationFrame(() => {
            visionModal.classList.add('active');

            const content = visionModal.querySelector('.popup-content');
            if (content) {
              requestAnimationFrame(() => {
                content.classList.add('show');
              });
            }
          });

          const closeBtn = visionModal.querySelector('#closeVisionBox');
          if (closeBtn) {
            closeBtn.addEventListener('click', () => {
              const content = visionModal.querySelector('.popup-content');
              if (content) content.classList.remove('show');

              setTimeout(() => {
                visionModal.classList.remove('active');
                visionModal.innerHTML = '';
              }, 300);
            });
          }

          visionModal.addEventListener('click', (e) => {
            if (e.target === visionModal) {
              const content = visionModal.querySelector('.popup-content');
              if (content) content.classList.remove('show');

              setTimeout(() => {
                visionModal.classList.remove('active');
                visionModal.innerHTML = '';
              }, 300);
            }
          });
        })
        .catch(err => console.error('Error loading vision.php:', err));
    });
  }
});
