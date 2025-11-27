function showNotif() {
    let box = document.getElementById("notifBox");
    box.style.display = "flex";

    // Set durasi popup 2.5 detik
    setTimeout(() => {
        box.style.display = "none";
        // Setelah popup hilang → pindah ke halaman reset password
        window.location.href = "reset_password.html";
    }, 2500);
}