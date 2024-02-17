document.addEventListener('DOMContentLoaded', function() {
  // Get menu toggle button and menu elements
  const menuToggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('.menu');

  // Function to toggle the menu
  function toggleMenu() {
    menu.classList.toggle('active');
  }

  // Function to handle smooth scrolling to anchor links
  function scrollToTarget(e) {
    e.preventDefault();
    const targetId = this.getAttribute('href').substring(1);
    const target = document.getElementById(targetId);
    if (target) {
      window.scrollTo({
        top: target.offsetTop,
        behavior: 'smooth'
      });
    }
  }

  // Add event listener for menu toggle button
  menuToggle.addEventListener('click', toggleMenu);

  // Add event listener for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', scrollToTarget);
  });
});
