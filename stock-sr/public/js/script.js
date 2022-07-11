const navbar = document.querySelector("#mynav");
window.onscroll = () => {
    if (window.scrollY > 80) {
        navbar.style.padding = "10px 10px";
        navbar.classList.add("nav-active");
        navbar.classList.add("navbar-dark");
    } else {
        navbar.style.padding = "20px 10px";
        navbar.classList.remove("nav-active");
        navbar.classList.remove("navbar-dark");
        navbar.classList.add("navbar-dark");
    }
};
