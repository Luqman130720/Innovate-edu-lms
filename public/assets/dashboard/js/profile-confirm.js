document.addEventListener("DOMContentLoaded", function () {

    const btnShowConfirm = document.getElementById("btnShowConfirmModal");
    const btnConfirmSubmit = document.getElementById("btnConfirmSubmit");
    const confirmPasswordInput = document.getElementById("confirmPasswordInput");
    const confirmPasswordHidden = document.getElementById("confirm_password_hidden");
    const form = document.getElementById("studentProfileForm");

    if (btnShowConfirm) {
        btnShowConfirm.addEventListener("click", function () {
            const modal = new bootstrap.Modal(document.getElementById("confirmPasswordModal"));
            modal.show();
        });
    }

btnConfirmSubmit.addEventListener("click", function () {
    if (!confirmPasswordInput.value) {
        alert("Password harus diisi!");
        return;
    }
    confirmPasswordHidden.value = confirmPasswordInput.value;

    // tutup modal sebelum submit
    const modal = bootstrap.Modal.getInstance(document.getElementById("confirmPasswordModal"));
    modal.hide();

    form.submit();
});

});
