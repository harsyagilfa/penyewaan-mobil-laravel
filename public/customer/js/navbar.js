let menuIcon = document.querySelector('#menu-icon');
let menu = document.querySelector('.menu');
menuIcon.onclick = () => {
  menuIcon.classList.toggle('bx-x');
  menu.classList.toggle('active');
};
/*= scrol section outline link */
let section = document.querySelectorAll('section');
let navLink = document.querySelectorAll('header nav a');


