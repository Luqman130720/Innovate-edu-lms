document.addEventListener("DOMContentLoaded", function () {
    let cropper;
    let currentTarget = null;

    const modalEl = document.getElementById("cropModalProfile");
    const modal = new bootstrap.Modal(modalEl);

    const image = document.getElementById("imageToCropProfile");
    const btn = document.getElementById("cropButtonProfile");

    function setupCrop(inputId, previewId, outputId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const output = document.getElementById(outputId);

        // ❗ WAJIB CHECK INI
        if (!input || !preview || !output) return;

        input.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (ev) {
                image.src = ev.target.result;

                currentTarget = { preview, output };

                modal.show();
            };

            reader.readAsDataURL(file);
        });
    }

    modalEl.addEventListener("shown.bs.modal", function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 1,
        });
    });

    modalEl.addEventListener("hidden.bs.modal", function () {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    btn.addEventListener("click", function () {
        const canvas = cropper.getCroppedCanvas({
            width: 500,
            height: 500,
        });

        const dataUrl = canvas.toDataURL("image/jpeg");

        currentTarget.preview.src = dataUrl;
        currentTarget.output.value = dataUrl;

        modal.hide();
    });

    // REGISTER ROLE
    setupCrop(
        "studentPhoto",
        "studentProfilePreview",
        "student_profile_picture_cropped",
    );

    setupCrop(
        "photo", // teacher
        "profilePicturePreview",
        "profile_picture_cropped",
    );
});
