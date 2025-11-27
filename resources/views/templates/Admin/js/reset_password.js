const correctCode = "123456";

const otpInputs = document.querySelectorAll(".otp-box input");
const resetBtn = document.querySelector(".btn-reset");
const errorMsg = document.getElementById("otp-error");

resetBtn.addEventListener("click", function (e) {
    e.preventDefault();

    let enteredCode = "";
    otpInputs.forEach(input => {
      enteredCode += input.value;
    });

    // Jika kode salah, tampilkan error
    if (enteredCode !== correctCode) {
      errorMsg.style.display = "block";
    } else {
      errorMsg.style.display = "none";
      window.location.href = "reset-success.html"; // pindah ke halaman sukses
    }
});