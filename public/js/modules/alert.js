export class Alert {
    closeAlert = () => {
        const close = document.querySelector(".close");
        if (close) close.addEventListener("click", () => {
            document.querySelector(".alert").remove();
        })
    }
}
