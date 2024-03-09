// When the user clicks the serve button, open the modal
serveButton.onclick = function() {
    // Clear previous selections
    $("#selectedItems").empty();
  
    // Loop through checkboxes to find selected items
    $(".menu_item input[type='checkbox']").each(function() {
      if ($(this).is(":checked")) {
        // Get the corresponding menu item details
        var menuItem = $(this).closest(".menu_item");
        var itemName = menuItem.find(".name_menu").text();
        var itemQuantity = menuItem.find(".quantity").text();
        
        // Create a new list item to display selected item details
        var listItem = $("<li>").text(itemName + " - " + itemQuantity);
        
        // Append the list item to the selected items list
        $("#selectedItems").append(listItem);
      }
    });
  
    // Show the modal
    serveConfirmationModal.style.display = "block";
  }
  