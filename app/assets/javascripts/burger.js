let burgerBtn = document.getElementById('burger');
let navLinks = document.getElementById('nav-links');

burgerBtn.addEventListener("click", (e) => {
  e.preventDefault();
  burgerBtn.innerText = "❌";
  navLinks.classList = "";
});