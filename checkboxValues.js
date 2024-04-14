const checkboxes = document.querySelectorAll(".checkbox");
const button = document.getElementById("applyButton");
const currentPage = document.getElementById("currentPage");

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

  const value = currentPage.getAttribute("data-value");
  console.log(value); // Output: example-value
  // redirecting the user if all the boxes are checked and the button is clicked
  if (allChecked && value == "attestationPage") {
    button.addEventListener("click", function () {
      // Update the window location when the button is clicked
      window.location.href = "attestationForm.html";
    });
  } else if (allChecked && value == "certifiedTrueCopyOfDocument") {
    button.addEventListener("click", function () {
      // Update the window location when the button is clicked
      window.location.href = "certifiedTrueCopyOfDocumentForm.html";
    });
  } else if (allChecked && value == "correctionOfNameForm") {
    button.addEventListener("click", function () {
      // Update the window location when the button is clicked
      window.location.href = "correctionOfNameForm.html";
    });
  }
  //   allChecked
  //     ? button.addEventListener("click", function () {
  //         // Update the window location when the button is clicked
  //         window.location.href = "attestationForm.html";
  //       })
  //     : "";
}
