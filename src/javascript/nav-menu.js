let lastScrollTop = 0; // Track the last scroll position
let navbar = document.getElementById("navbar"); // The navbar

// Event listener to track scrolling
window.addEventListener("scroll", function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        // If scrolling down, hide the navbar
        navbar.style.top = "-100px"; // You can adjust this value depending on the height of your navbar
    } else {
        // If scrolling up, show the navbar
        navbar.style.top = "0";
    }
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative scroll value
});

// Function to toggle the menu (open/close)
function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.classList.toggle("open");  // Add or remove the 'open' class to slide the menu in/out
}

function closeMenu () {
    var menu = document.getElementById("menu");
    menu.classList.remove("open");
}