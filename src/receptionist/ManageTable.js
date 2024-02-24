const showDialog = () => {};

const openModalBtns = document.getElementsByClassName("openModal");
const modal = document.getElementById("modal");
const closeModalBtn = document.getElementById("closeModal");
const closeBtn = document.getElementById("closeBtn");

[...openModalBtns].forEach((element) =>
  element.addEventListener("click", () => {
    modal.classList.remove("hidden");
  })
);

console.log(openModalBtns);

closeModalBtn.addEventListener("click", () => {
  modal.classList.add("hidden");
});

closeBtn.addEventListener("click", () => {
  modal.classList.add("hidden");
});
