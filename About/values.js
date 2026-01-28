document.addEventListener('DOMContentLoaded', () => {
  const valuesBtn = document.getElementById('values-item');

  const valuesModal = document.createElement('div');
  valuesModal.id = 'valuesModal';
  valuesModal.classList.add('popup-modal');
  document.body.appendChild(valuesModal);

  if (valuesBtn && valuesModal) {
    valuesBtn.addEventListener('click', () => {
      fetch('values.php')
        .then(res => res.text())
        .then(html => {
          valuesModal.innerHTML = html;

          requestAnimationFrame(() => {
            valuesModal.classList.add('active');

            const content = valuesModal.querySelector('.popup-content');
            if (content) {
              requestAnimationFrame(() => {
                content.classList.add('show');
              });
            }
          });

          const closeBtn = valuesModal.querySelector('#closeValuesBox');
          if (closeBtn) {
            closeBtn.addEventListener('click', () => {
              const content = valuesModal.querySelector('.popup-content');
              if (content) content.classList.remove('show');

              setTimeout(() => {
                valuesModal.classList.remove('active');
                valuesModal.innerHTML = '';
              }, 300);
            });
          }

          valuesModal.addEventListener('click', (e) => {
            if (e.target === valuesModal) {
              const content = valuesModal.querySelector('.popup-content');
              if (content) content.classList.remove('show');

              setTimeout(() => {
                valuesModal.classList.remove('active');
                valuesModal.innerHTML = '';
              }, 300);
            }
          });
        })
        .catch(err => console.error('Error loading values.php:', err));
    });
  }
});
