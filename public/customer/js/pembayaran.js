const openPopupBtn = document.getElementById('openPopupBtn');
const closePopupBtn = document.getElementById('closePopupBtn');
const uploadPopup = document.getElementById('uploadPopup');

openPopupBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah default behavior dari link
    uploadPopup.style.display = 'block';
  });
// Event untuk menutup popup
closePopupBtn.addEventListener('click', function() {
    uploadPopup.style.display = 'none';
  });
// Menutup popup saat klik di luar area popup
window.addEventListener('click', function(event) {
    if (event.target == uploadPopup) {
      uploadPopup.style.display = 'none';
    }
  });
