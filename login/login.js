const btnSignIn = document.querySelector("#signin");
const btnSignUp = document.querySelector("#signup");
const firstContent = document.querySelector(".first-content");
const secondContent = document.querySelector(".second-content");

btnSignIn.addEventListener("click", () => {
    firstContent.classList.add("show-login");
    secondContent.classList.add("show-login");
});

btnSignUp.addEventListener("click", () => {
    firstContent.classList.remove("show-login");
    secondContent.classList.remove("show-login");
});
