<script>
    const themeLink = document.getElementById('themeLink');
    const darkModeToggle = document.querySelector('.dark-mode-toggle');
    let isDarkMode = <?php echo $isDarkMode ? 'true' : 'false'; ?>;

    applyTheme();

    darkModeToggle.addEventListener('click', () => {
        isDarkMode = !isDarkMode;
        applyTheme();
        updateDarkModeIcon();
        document.cookie = `isDarkMode=${isDarkMode ? '1' : '0'}; expires=Thu, 31 Dec 2037 23:59:59 UTC; path=/`;
    });

    function applyTheme() {
        const themeName = isDarkMode ? 'dark.css' : 'light.css';
        themeLink.href = `css/themes/${themeName}`;
    }

    function updateDarkModeIcon() {
        const sunIcon = darkModeToggle.querySelector('.fa-sun');
        const moonIcon = darkModeToggle.querySelector('.fa-moon');

        if (isDarkMode) {
            moonIcon.style.display = 'none';
            sunIcon.style.display = 'inline-block';
        } else {
            sunIcon.style.display = 'none';
            moonIcon.style.display = 'inline-block';
        }
    }

    // Initial icon setup
    updateDarkModeIcon();
</script>