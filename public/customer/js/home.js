var typed = new Typed(".multiple-text", {
    strings: ["TEMPAT PENYEWAAN MOBIL TERBAIK","KUALITAS BINTANG LIMA,HARGA KAKI LIMA"],
    typeSpeed: 80,
    backSpeed: 50,
    backDelay: 1500,
    delay:500,
    loop: true
  });

  document.addEventListener('DOMContentLoaded', function () {
    const textElement = document.getElementById('tentang-p-mobile');
    // Add a class to trigger animation
    textElement.classList.add('animate');
});
  /*Scroll */
  ScrollReveal({
    reset: true,
    distance: '80px',
    duration : 2000,
    delay:200
  })
  ScrollReveal().reveal('.hero-content, .tentang-h2,#divisi-box', { origin: 'top' });

  ScrollReveal().reveal('.tentang-img, .tentang-p,#divisi-box2', { origin: 'bottom' });

  ScrollReveal().reveal('.hero-img, .visi_misi-h2 , .alamat-h2', { origin: 'left' });

  ScrollReveal().reveal('.visi_misi-p, .maps', { origin: 'right' });

  ScrollReveal().reveal('', { delay: '500' });
      ScrollReveal().reveal('.hero-content', { delay: '1000' });
      ScrollReveal().reveal('', { delay: '1200' });
      ScrollReveal().reveal('', { delay: '2000' });
      ScrollReveal().reveal('', { delay: '2500' });
