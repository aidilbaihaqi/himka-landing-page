function openPopup(name, email, date, message, icon) {
    document.getElementById('popup-name').innerText = name;
    document.getElementById('popup-email').innerText = email;
    document.getElementById('popup-date').innerText = date;
    document.getElementById('popup-message').innerText = message;
    document.getElementById('popup-icon').src = icon;

    document.getElementById('popup').style.display = "flex";
}

function closePopup() {
    document.getElementById('popup').style.display = "none";
}