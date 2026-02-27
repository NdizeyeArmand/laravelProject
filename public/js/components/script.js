window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;

    if (document.body.scrollHeight <= window.innerHeight + headerHeight) {
        return;
    }

    window.addEventListener('scroll', function() {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        if ( currentTop < scrollPos) {
            // Scrolling Up
            if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-visible');
            } else {
                mainNav.classList.remove('is-visible', 'is-fixed');
            }
        } else {
            // Scrolling Down
            mainNav.classList.remove('is-visible');
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });
});

function updateButtonState(isDarkMode) {
    const button = document.getElementById('themeToggle');
    const moonIcon = button.querySelector('.fa-moon');
    const sunIcon = button.querySelector('.fa-sun');

    if (isDarkMode) {
        moonIcon.classList.add('d-none');
        sunIcon.classList.remove('d-none');
    } else {
        sunIcon.classList.add('d-none');
        moonIcon.classList.remove('d-none');
    }
}

function setDarkMode(isDarkMode) {
    const body = document.body;
    const html = document.documentElement;

    if (isDarkMode) {
        body.classList.add('dark-mode');
        html.classList.add('dark-mode');
    } else {
        body.classList.remove('dark-mode');
        html.classList.remove('dark-mode');
    }

    localStorage.setItem('darkMode', isDarkMode.toString());
    updateButtonState(isDarkMode);
}

function toggleTheme() {
    const isDarkMode = !document.body.classList.contains('dark-mode');
    setDarkMode(isDarkMode);
}

document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    setDarkMode(isDarkMode);
});
