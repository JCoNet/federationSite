var modal = document.getElementById('popupConatiner');
var loginbox = document.getElementById('popup');

var btn = document.getElementById("login");

btn.onclick = function() {
    modal.style.display = "block";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
