document.addEventListener('DOMContentLoaded', function() {
    // Mark current page link as active
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        const linkPath = link.getAttribute('href');
        if (currentPath === linkPath || (currentPath.includes('jadwal-siaran') && linkPath.includes(
                'jadwal-siaran'))) {
            link.classList.add('active', 'fw-bold');
            link.querySelector('span').style.width = '50%';
            link.querySelector('span').style.opacity = '1';
        }
    });
});

