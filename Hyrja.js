document.addEventListener("DOMContentLoaded", () => {
const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const btnIndicator = document.getElementById("btn-indicator");


window.showRegister = () => {
loginForm.style.display = "none";
registerForm.style.display = "flex";
btnIndicator.style.left = "50%";
};


window.showLogin = () => {
loginForm.style.display = "flex";
registerForm.style.display = "none";
btnIndicator.style.left = "0";
};


loginForm.addEventListener("submit", e => {
e.preventDefault();
alert("Login successful!");
});


registerForm.addEventListener("submit", e => {
e.preventDefault();
alert("Registration successful!");
});
});