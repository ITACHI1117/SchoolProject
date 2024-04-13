// Get references to checkboxes and the button
const checkboxes = document.querySelectorAll(".checkbox");
const button = document.getElementById("applyButton");

// Add change event listener to checkboxes
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", updateButtonText);
});

// Function to update button text
function updateButtonText() {
  // Check if all checkboxes are checked
  const allChecked = Array.from(checkboxes).every(
    (checkbox) => checkbox.checked
  );
  // Update button text accordingly
  button.textContent = allChecked
    ? "Apply For ATTESTATION LETTER"
    : "Fulfill The Requirements";

  // redirecting the user if all the boxes are checked and the button is clicked
  allChecked
    ? button.addEventListener("click", function () {
        // Update the window location when the button is clicked
        window.location.href = "attestationForm.html";
      })
    : "";
}
