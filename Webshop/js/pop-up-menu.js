const selectedAll = document.querySelectorAll(".selected-Menu");

selectedAll.forEach((selected => {
  const optionsContainer = selected.previousElementSibling;

  const optionsList = document.querySelectorAll(".option-Menu");

  selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
}); 
}))