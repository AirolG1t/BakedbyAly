document.addEventListener("DOMContentLoaded", function () {
    const pswrdFields = document.querySelectorAll(".form input[type='password']");
    const toggleBtns = document.querySelectorAll(".form .input-field i");

    toggleBtns.forEach((toggleBtn, index) => {
        toggleBtn.addEventListener("click", () => {
            if (pswrdFields[index].type === "password") {
                pswrdFields[index].type = "text";
                toggleBtn.classList.add("active");
            } else {
                pswrdFields[index].type = "password";
                toggleBtn.classList.remove("active");
            }
        });
    });
});