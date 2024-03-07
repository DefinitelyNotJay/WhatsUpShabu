<script>
  function updateStatusAndRedirect(order_id) {
    // ส่งคำขอ AJAX ไปยังหน้าที่ทำการอัปเดตสถานะ
    $.ajax({
      type: 'GET',
      url: 'order/update_status.php?order_id=' + order_id,
      success: function(response) {
        // หลังจากอัปเดตสถานะเรียบร้อยแล้ว นำผู้ใช้ไปยังหน้าที่ถูกต้อง
        window.location.href = 'order/recorder.php?order_id=' + order_id;
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    })
  }
</script>
