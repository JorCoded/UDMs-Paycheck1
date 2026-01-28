document.addEventListener('DOMContentLoaded', () => {
  const missionBtn = document.getElementById('mission-item');

  const missionModal = document.createElement('div');
  missionModal.id = 'missionModal';
  missionModal.classList.add('popup-modal');
  document.body.appendChild(missionModal);

  if (missionBtn && missionModal) {
    missionBtn.addEventListener('click', () => {
      fetch('mission.php')
        .then(res => res.text())
        .then(html => {
          missionModal.innerHTML = html;

          // Show modal container
          requestAnimationFrame(() => {
            missionModal.classList.add('active');

            // Show popup content with fade-in
            const content = missionModal.querySelector('.popup-content');
            if (content) {
              requestAnimationFrame(() => {
                content.classList.add('show');
              });
            }
          });

          // Close button logic
          const closeBtn = missionModal.querySelector('#closeMissionBox');
          if (closeBtn) {
            closeBtn.addEventListener('click', () => {
              const content = missionModal.querySelector('.popup-content');
              if (content) content.classList.remove('show');

              setTimeout(() => {
                missionModal.classList.remove('active');
                missionModal.innerHTML = '';
              }, 300); // match transition duration
            });
          }

          // Click outside to close
          missionModal.addEventListener('click', (e) => {
            if (e.target === missionModal) {
              const content = missionModal.querySelector('.popup-content');
              if (content) content.classList.remove('show');

              setTimeout(() => {
                missionModal.classList.remove('active');
                missionModal.innerHTML = '';
              }, 300);
            }
          });
        })
        .catch(err => console.error('Error loading mission.php:', err));
    });
  }
});
