//dropdown navbar menu tentang //
const dropdownTriggers = document.querySelectorAll('.dropdown');

dropdownTriggers.forEach((trigger) => {
  trigger.addEventListener('mouseenter', () => {
    trigger.querySelector('.dropdown-menu').style.display = 'block';
  });

  trigger.addEventListener('mouseleave', () => {
    trigger.querySelector('.dropdown-menu').style.display = 'none';
  });
});
//dropdown social media //
const socialMediaTriggers = document.querySelectorAll('.social-media');

  socialMediaTriggers.forEach((trigger) => {
  trigger.addEventListener('mouseenter', () => {
    trigger.querySelector('.social-media-menu').style.display = 'block';
  });

  trigger.addEventListener('mouseleave', () => {
    trigger.querySelector('.social-media-menu').style.display = 'none';
  });
});


