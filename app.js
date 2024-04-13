const selectElement = document.getElementById("faculty");
let selectedValue = "";

// Add event listener for "change" event
selectElement.addEventListener("change", function () {
  // Get the selected option
  var selectedOption = selectElement.options[selectElement.selectedIndex];

  // Get the value of the selected option
  var selectedValue = selectedOption.value;

  // Log or use the selected value

  if (selectedValue == "01") {
    addOptions(ArtsOptions);
  } else if (selectedValue == "02") {
    addOptions(EducationOptions);
  } else if (selectedValue == "03") {
    addOptions(EngineeringOptions);
  } else if (selectedValue == "04") {
    addOptions(LawOptions);
  }
  return selectedValue;
});

function addOptions(options) {
  // Get the <select> element
  const selectDepartmentElement = document.getElementById("MOE");

  //   setting the selectDepartmentElement value to empty string before appending
  selectDepartmentElement.innerHTML = "";

  // Loop through the array of options
  options.forEach(function (optionData) {
    // Create a new <option> element
    var option = document.createElement("option");

    // Set the value and text of the new <option>
    option.value = optionData.value;
    option.text = optionData.text;

    // Append the new <option> to the <select>
    selectDepartmentElement.appendChild(option);
  });
}

// Faculty of Education Options
const EducationOptions = [
  { value: "null", text: "Select Department" },
  { value: "option4", text: "ACCOUNTING EDUCATION" },
  { value: "option5", text: "ARABIC EDUCATION" },
  { value: "option6", text: "BIOLOGY EDUCATION" },
  { value: "option7", text: "BUSINESS EDUCATION" },
  { value: "option8", text: "CHEMISTRY EDUCATION" },
  { value: "option9", text: "CHRISTIAN RELIGIOUS STUDIES EDUCATION" },
  { value: "option0", text: "COMPUTER SCIENCE EDUCATION" },
  { value: "option01", text: "ECONOMICS EDUCATION" },
  { value: "option02", text: "EDUCATIONAL FOUNDATION" },
  { value: "option03", text: "EDUCATIONAL TECHNOLOGY" },
];

// Faculty of Education Options
const ArtsOptions = [
  { value: "null", text: "Select Department" },
  { value: "option4", text: "ARABIC" },
  { value: "option5", text: "ENGLISH LANGUAGE" },
  { value: "option6", text: "ENGLISH LITERATURE" },
  { value: "option7", text: "FRENCH" },
  { value: "option8", text: "HISTORY AND INTERNATIONAL RELATIONS" },
  { value: "option9", text: "Master in International Relations" },
  {
    value: "option0",
    text: "MASTER IN INTERNATIONAL RELATIONS &amp; STRATEGIC STUDIES",
  },
  { value: "option01", text: "MUSIC" },
  { value: "option02", text: "PHILOSOPHY" },
];

const EngineeringOptions = [
  { value: "null", text: "Select Department" },
  { value: "option4", text: "CHEMICAL AND POLYMER ENGINEERING" },
  { value: "option5", text: "ELECTRONICS AND COMPUTER ENGINEERING" },
  { value: "option6", text: "MECHANICAL ENGINEERING" },
];

const LawOptions = [
  { value: "null", text: "Select Department" },
  { value: "option4", text: "General Law (LL.M)" },
  { value: "option5", text: "ISLAMIC AND COMMON LAW" },
  { value: "option6", text: "Maritime and Commercial Law (LL.M)" },
  { value: "option6", text: "Master in Legal Studies (MLS)" },
];
