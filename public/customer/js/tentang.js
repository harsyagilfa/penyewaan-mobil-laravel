ScrollReveal({
  reset: true,
  distance: '80px',
  duration: 2000,
  delay: 200,
});
/* tentang */
ScrollReveal().reveal('.tentang-h2', { origin: 'top' });

ScrollReveal().reveal('.social-media', { origin: 'bottom' });

ScrollReveal().reveal('.tentang-p', { origin: 'left' });

ScrollReveal().reveal('', { origin: 'right' });

ScrollReveal().reveal('.tentang-h2', { delay: '300' });
    ScrollReveal().reveal('.tentang-p', { delay: '600' });
    ScrollReveal().reveal('.social-media', { delay: '900' });
    ScrollReveal().reveal('tentang-img', { delay: '1200' });
/* keunggulan */
ScrollReveal().reveal('.keunggulan-h1,. .team-h2', { origin: 'top' });

ScrollReveal().reveal('.keunggulan1-content, #keunggulan1-img', { origin: 'left' });

ScrollReveal().reveal('.keunggulan2-content, #keunggulan2-img', { origin: 'right' });

/*= galery  */
ScrollReveal().reveal('.galery-h2,', { origin: 'top' });

ScrollReveal().reveal('#foto2', { origin: 'bottom' });

ScrollReveal().reveal('#foto1', { origin: 'left' });

ScrollReveal().reveal('#foto3', { origin: 'right' });

ScrollReveal().reveal('#foto1', { delay: '300' });

ScrollReveal().reveal('#foto3', { delay: '600' });

ScrollReveal().reveal('#foto2', { delay: '900' });

/*= team card */

ScrollReveal().reveal('#team-card1,#team-card4', { origin: 'left' });

ScrollReveal().reveal('#team-card2', { origin: 'top' });

ScrollReveal().reveal('#team-card3,#team-card5', { origin: 'right' });

ScrollReveal().reveal('#team-card1,#team-card4', { delay: '300' });
ScrollReveal().reveal('#team-card3,#team-card5', { delay: '600' });
ScrollReveal().reveal('#team-card2', { delay: '900' });
