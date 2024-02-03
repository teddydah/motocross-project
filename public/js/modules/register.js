export class Register {
    displayPasswordConfirmationInput = (password, confirmPassword) => {
        if (password) password.addEventListener("input", () => {
            confirmPassword.classList.remove("d-none");
        })
    }
}
