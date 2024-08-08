// toggle
const navbarNav = document.querySelector(".navbar-nav");
document.querySelector("#menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

/* klik luar sidebar */
const menuNav = document.querySelector("#menu");
document.addEventListener("click", function (e) {
  if (!menuNav.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});
