// Get modal element and close button
var modal = document.getElementById('successModal');
var span = document.getElementsByClassName('close')[0];
// Close the modal when the user clicks on <span> (x)
span.onclick = function() {
    modal.style.display = "none";
}
