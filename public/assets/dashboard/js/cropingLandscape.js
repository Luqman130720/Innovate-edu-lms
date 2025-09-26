document.addEventListener("DOMContentLoaded", function () {
    let cropper;
    const coverImageInput = document.getElementById("cover_image_input");
    const imageToCrop = document.getElementById("imageToCrop");
    const cropModalElement = document.getElementById("cropModal");
    // Pastikan modal hanya dibuat jika elemennya ada di halaman
    const cropModal = cropModalElement
        ? new bootstrap.Modal(cropModalElement)
        : null;

    const cropButton = document.getElementById("cropButton");
    const coverPreview = document.getElementById("cover-preview");
    const croppedCoverImageInput = document.getElementById("cover_image");
    const materialForm = document.getElementById("materialForm");

    // Pastikan elemen input ada sebelum menambahkan event listener
    if (coverImageInput) {
        coverImageInput.addEventListener("change", function (event) {
            const files = event.target.files;
            if (files && files.length > 0) {
                const file = files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    imageToCrop.src = e.target.result;
                    imageToCrop.onload = function () {
                        coverPreview.src = e.target.result;
                        if (cropModal) {
                            cropModal.show();
                        }
                    };
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Pastikan modal ada sebelum menambahkan event listener
    if (cropModalElement) {
        cropModalElement.addEventListener("shown.bs.modal", function () {
            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(imageToCrop, {
                aspectRatio: 16 / 9,
                viewMode: 1,
                autoCropArea: 0.8,
                background: false,
            });
        });

        // Event listener saat modal disembunyikan
        cropModalElement.addEventListener("hidden.bs.modal", function () {
            // Ini akan memastikan hidden input terisi jika pengguna membatalkan
            if (!croppedCoverImageInput.value) {
                coverPreview.src = "assets/dashboard/img/bg-profile.jpg";
                croppedCoverImageInput.value =
                    "assets/dashboard/img/bg-profile.jpg";
            }

            document.activeElement.blur();

            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        });
    }

    // Pastikan tombol crop ada
    if (cropButton) {
        cropButton.addEventListener("click", function () {
            if (cropper) {
                const croppedCanvas = cropper.getCroppedCanvas({
                    width: 800,
                    height: 450,
                });

                const dataUrl = croppedCanvas.toDataURL("image/jpeg", 0.9);
                coverPreview.src = dataUrl;
                croppedCoverImageInput.value = dataUrl;

                if (cropModal) {
                    cropModal.hide();
                }
            }
        });
    }

    // Tambahkan event listener ini untuk memastikan cover terkirim
    if (materialForm) {
        materialForm.addEventListener("submit", function (event) {
            if (!croppedCoverImageInput.value) {
                // Jika input kosong, kirim nilai default
                croppedCoverImageInput.value =
                    "assets/dashboard/img/bg-profile.jpg";
            }
        });
    }
});
