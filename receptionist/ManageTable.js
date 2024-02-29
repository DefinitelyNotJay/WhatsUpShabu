
const addCustomerBtn = document.getElementsByClassName("addCustomerBtn");

const purchaseBtns = document.querySelectorAll(".purchaseBtn");

[...addCustomerBtn].forEach(btn => btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let id = e.target.closest("button").getAttribute("id");
    getInfoFromID(id);
    
}))

purchaseBtns.forEach(btn => btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let table_id = e.target.closest("button").getAttribute("tableId");
    let url = `Payment.php?table_id=` + table_id;
    window.location.href = url;
}))



const getInfoFromID = (id) => {
    let url = `AddCustomer.php?id=` + id;
    window.location.href = url;
}

