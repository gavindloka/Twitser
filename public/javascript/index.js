document.addEventListener("DOMContentLoaded", function () {
    var imageElement = document.getElementById("profile-image");
    var fileInput = document.getElementById("profile-file");

    if (imageElement && fileInput) {
        imageElement.addEventListener("click", function () {
            fileInput.click();
        });

        fileInput.addEventListener("change", function (event) {
            var selectedFile = event.target.files[0];
            if (selectedFile && selectedFile.type.startsWith("image/")) {
                let url = URL.createObjectURL(selectedFile);
                imageElement.src = `${url}`;
            }
        });
    }
});
