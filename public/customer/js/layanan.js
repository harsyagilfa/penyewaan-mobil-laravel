ScrollReveal({
      reset: true,
      distance: '80px',
      duration : 2000,
      delay:200
    })
    ScrollReveal().reveal('.layanan1-h2, .layanan2-h2', { origin: 'top' });
    
    ScrollReveal().reveal('.btn', { origin: 'bottom' });
    
    ScrollReveal().reveal('.layanan1-p, #layanan2-img', { origin: 'left' });
    
    ScrollReveal().reveal('.layanan2-p, #layanan1-img', { origin: 'right' });


    ScrollReveal().reveal('.layanan1-h2 , .layanan2-h2', { delay: '300' });
    ScrollReveal().reveal('.layanan1-p , .layanan2-p', { delay: '600' });
    ScrollReveal().reveal('.btn', { delay: '900' });
    ScrollReveal().reveal('#team-card5', { delay: '1200' });