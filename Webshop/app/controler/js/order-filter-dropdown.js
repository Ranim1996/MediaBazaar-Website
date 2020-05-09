const selected = document.querySelector(".selected-ord");
const optionsContainer = document.querySelector(".options-container-ord");

const optionsList = document.querySelectorAll(".option-ord");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
    
  });
});