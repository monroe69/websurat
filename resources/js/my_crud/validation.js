const number = document.querySelector(".number");

if (number) {
    // just number keys and delete
    number.addEventListener("keydown", (e) => {
        if (
            e.key === "Backspace" ||
            e.key === "Delete" ||
            e.key === "ArrowLeft" ||
            e.key === "ArrowRight" ||
            e.key === "ArrowUp" ||
            e.key === "ArrowDown" ||
            e.key === "Tab" ||
            e.key === "Enter" ||
            e.key === "Escape"
        ) {
            return;
        }
        if (e.key.match(/[^0-9]/g)) {
            e.preventDefault();
        }
    });
}
