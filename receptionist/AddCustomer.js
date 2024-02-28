cancelBtn = document.getElementById("cancel");
submitBtn = document.getElementById("submit");

console.log(cancelBtn);

cancelBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    window.location.href = "./ManageTable.php";
});

// submitBtn.addEventListener("click", (e)=>{
//     let id = e.target.getAttribute("tableId");
    // let url = `action.php?id=` + id;
    // window.location.href = url;
    
// })