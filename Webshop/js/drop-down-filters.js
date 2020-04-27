const selectedAll = document.querySelectorAll(".selected");

selectedAll.forEach((selected => {
  const optionsContainer = selected.previousElementSibling;

  const optionsList = document.querySelectorAll(".option");

  selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
}); 
}))

