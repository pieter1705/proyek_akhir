// toggle class active
const navbarNav = document.querySelector(".navbar-nav");
// Ketik humburger menu di klik
document.querySelector("#humburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

//klik di luar menu humburger
const humburger = document.querySelector("#humburger-menu");

document.addEventListener("click", function (e) {
  if (!humburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});
