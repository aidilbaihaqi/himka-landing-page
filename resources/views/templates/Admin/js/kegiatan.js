const modal = document.getElementById("modalUpload");
const btnAdd = document.querySelector(".add-btn");
const btnBatal = document.getElementById("btnBatal");

btnAdd.addEventListener("click", () => {
    modal.style.display = "flex";
});

btnBatal.addEventListener("click", () => {
    modal.style.display = "none";
});