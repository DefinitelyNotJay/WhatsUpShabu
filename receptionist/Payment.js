let submitBtn = document.getElementById("submit");

submitBtn.addEventListener("click", (e)=>{
    let id = e.target.getAttribute("tableId");
    alert(id);
    window.location.href = `action.php?paymentId=` + id;  
})