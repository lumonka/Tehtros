const navbar = document.querySelector('.navbar');
let top = navbar.offsetTop;
function stickynavbar() {
    if (window.scrollY >= 850 && window.innerWidth > 768) {
        navbar.classList.add('fixed', 'shadow-xl');
    } else {
        navbar.classList.remove('fixed', 'shadow-xl');
    }
}
window.addEventListener('scroll', stickynavbar);
