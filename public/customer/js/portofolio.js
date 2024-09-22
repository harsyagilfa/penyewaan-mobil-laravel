ScrollReveal({
      reset: true,
      distance: '80px',
      duration : 2000,
      delay:200
    })
    ScrollReveal().reveal('.hero-h2, .galery-h2, #galery-img1', { origin: 'top' });
    
    ScrollReveal().reveal('.hero-p2', { origin: 'bottom' });
    
    ScrollReveal().reveal('.hero-p1, #galery-img2, #galery-img4', { origin: 'left' });
    
    ScrollReveal().reveal('.hero-img , #galery-img3, #galery-img5', { origin: 'right' });


    ScrollReveal().reveal('.hero-h2, .galery-h2 ', { delay: '500' });
    ScrollReveal().reveal('.hero-p1, #galery-img1', { delay: '700' });
    ScrollReveal().reveal('.hero-p2 , #galery-img2, #galery-img4', { delay: '900' });
    ScrollReveal().reveal('.hero-img, #galery-img3,#galery-img5', { delay: '1100' });