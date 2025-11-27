const modal = document.getElementById("uploadModal");
const addBtn = document.querySelector(".add-btn");

addBtn.onclick = () => {
    modal.style.display = "flex";
};

function closeModal() {
    modal.style.display = "none";
}