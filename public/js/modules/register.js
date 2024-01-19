export class Register {
    displayPasswordConfirmationInput = (password, passwordConfirmation) => {
        if (password) password.addEventListener("input", () => {
            passwordConfirmation.classList.remove("d-none");
        })
    }
}
