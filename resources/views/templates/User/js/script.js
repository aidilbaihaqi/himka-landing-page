const navToggle = document.getElementById('navToggle');
const navMenu = document.getElementById('nav-menu');

navToggle.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});

const dots = document.querySelectorAll('.dot');
const slider = document.querySelector('.slider-wrapper');

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
      
      // ubah posisi slider
      slider.style.transform = `translateX(-${index * 100}%)`;

      // update dot aktif
      dots.forEach(d => d.classList.remove('active'));
      dot.classList.add('active');
  });
});