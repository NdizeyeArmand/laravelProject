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
}

(function() {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    setDarkMode(isDarkMode);
})();

document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    setDarkMode(isDarkMode);
});