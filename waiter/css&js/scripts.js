var checkboxes = document.querySelectorAll('input[name="checkboxes[]"]');
var isChecked = false;
checkboxes.forEach(function(checkbox) {
  if (checkbox.checked) {
    isChecked = true;
    // ทำอะไรก็ตามที่ต้องการเมื่อ checkbox ถูกติ๊กไว้
  } else {
    // ทำอะไรก็ตามที่ต้องการเมื่อ checkbox ไม่ถูกติ๊กไว้
  }
});
