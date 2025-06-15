document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("image");
    const preview = document.getElementById("preview");

    // Live Image Preview
    fileInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const fileReader = new FileReader();
            fileReader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            fileReader.readAsDataURL(file);
        } else {
            preview.style.display = "none";
        }
    });

});
