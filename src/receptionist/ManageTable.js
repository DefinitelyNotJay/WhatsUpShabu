
const openModalBtns = document.getElementsByClassName("openModal");
const modal = document.getElementById("modal");
const closeModalBtn = document.getElementById("closeModal");
const closeBtn = document.getElementsByClassName("closeBtn");

const tableNo = document.getElementById("table-no");

const openPaymentsBtns = document.getElementsByClassName("openPayments");
const payment = document.getElementById("payment");
const closePaymentBtns = document.getElementsByClassName("closePayment");

[...openModalBtns].forEach((element) =>
  element.addEventListener("click", (e) => {
    modal.classList.remove("hidden");
  })
);

// console.log(openModalBtns);
console.log(...closeBtn);

closeModalBtn.addEventListener("click", () => {
  modal.classList.add("hidden");
});

[...closeBtn].forEach(element => element.addEventListener("click", () => {
  modal.classList.add("hidden");
}));

[...openPaymentsBtns].forEach(element => 
  element.addEventListener("click", () => {
  payment.classList.remove("hidden");
}));

[...closePaymentBtns].forEach(element => element.addEventListener("click", ()=>{
  payment.classList.add("hidden");
}))
