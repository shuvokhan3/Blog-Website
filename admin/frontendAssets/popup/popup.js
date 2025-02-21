document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("deletePopup");
    const confirmBtn = document.getElementById("confirmDelete");
    const cancelBtn = document.getElementById("cancelDelete");

    window.showDeletePopup = function (callback) {
        popup.style.display = "flex"; // Show popup

        confirmBtn.onclick = function () {
            callback(); // Execute the delete function
            popup.style.display = "none";
        };

        cancelBtn.onclick = function () {
            popup.style.display = "none"; // Hide popup
        };
    };
});
