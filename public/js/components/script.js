window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;
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
            mainNav.classList.remove(['is-visible']);
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });
});

function toggleTheme() {
    const body = document.body;
    const isDarkMode = body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', isDarkMode);

    fetch('/set-theme', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ darkMode: isDarkMode })
    });
    
    const moonIcon = document.querySelector('.fa-moon');
    const sunIcon = document.querySelector('.fa-sun');
    
    if (isDarkMode) {
        moonIcon.classList.add('d-none');
        sunIcon.classList.remove('d-none');
    } else {
        sunIcon.classList.add('d-none');
        moonIcon.classList.remove('d-none');
    }
}

// Apply dark mode on page load if it was previously set
document.addEventListener('DOMContentLoaded', (event) => {
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
});