const addModal = new bootstrap.Modal(document.getElementById("addCustomerModal"));

const addCustomerBtn = document.getElementsByClassName("addCustomerBtn");

[...addCustomerBtn].forEach(btn => btn.addEventListener("click", (e)=>{
    e.preventDefault();
    let id = e.target.getAttribute("id");
    getInfoFromID(id);
    
}))

const getInfoFromID = async (id) => {
    let url = `ManageTable.php?id=` + id;
    window.location.href = url;
}


