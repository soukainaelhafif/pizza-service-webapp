document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("darkMode") === "enabled") {
        document.body.classList.add("dark-mode");
        document.getElementById("sun").style.display = "block";
        document.getElementById("moon").style.display = "none";
    } else {
        document.getElementById("moon").style.display = "block";
        document.getElementById("sun").style.display = "none";
    }
});

function toggleDarkMode() {
    const isDark = document.body.classList.toggle("dark-mode");

    localStorage.setItem("darkMode", isDark ? "enabled" : "disabled");

    const sunIcon = document.getElementById("sun");
    const moonIcon = document.getElementById("moon");
    
    if (isDark) {
        sunIcon.style.display = "block";
        moonIcon.style.display = "none";
    } else {
        moonIcon.style.display = "block";
        sunIcon.style.display = "none";
    }
}