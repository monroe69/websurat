// queryselector file-upload
const file_upload = document.querySelectorAll(".file-upload");
// style file-upload
const fileUpload = () => {
    file_upload.forEach(function (file) {
        file.style.display = "none";
        // get value attribute id
        const id = file.getAttribute("id");
        // find parent
        const parent = file.parentNode;
        // find children by attribute data-id
        const fileUpload = parent.querySelector(`[data-id='${id}']`);
        // button style
        fileUpload.style.display = "block";

        fileUpload.addEventListener("click", function (e) {
            e.preventDefault();
            // file addlistener
            file.click();
        });
        // file change
        file.addEventListener("change", function (e) {
            // get file name
            const name = e.target.value.split("\\").pop();
            // add file name to fileUpload
            const span = parent.querySelector(`[data-span='${id}']`);
            span.innerHTML = name;
            // create span element
            const spanElement = document.createElement("span");
            // add class
            spanElement.classList.add("file-name");
            // add text
            spanElement.textContent = "x";
            // spanElament style
            spanElement.style.cursor = "pointer";
            spanElement.style.float = "right";
            // spanElement addEventListener
            spanElement.addEventListener("click", function (e) {
                e.preventDefault();
                // remove file name
                span.innerHTML = "";
                // remove file
                file.value = "";
            });
            // append span to fileUpload
            span.appendChild(spanElement);
        });
    });
};

if (file_upload) {
    fileUpload();
}
