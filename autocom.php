<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Form with Autocomplete</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

<form>
    <div>
        <label for="itemname">Item Name:</label>
        <input type="text" id="itemname" name="itemname" autocomplete="off">
    </div>
    <div>
        <label for="itemcode">Item Code:</label>
        <input type="text" id="itemcode" name="itemcode" readonly>
    </div>
</form>

<script>
$(document).ready(function() {
    var availableItems = []; // This will store all the available item names from the autocomplete

    $('#itemname').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: 'get_item_names.php', // PHP script to fetch item names
                method: 'GET',
                data: { term: request.term }, // Send user input as the term
                success: function(data) {
                    availableItems = JSON.parse(data).map(item => item.value); // Store the item names
                    response(availableItems); // Send available items to autocomplete
                }
            });
        },
        minLength: 1, // Minimum characters before triggering autocomplete
        select: function(event, ui) {
            var selectedItem = ui.item.value;
            $.ajax({
                url: 'get_item_code.php', // PHP script to fetch the item code
                method: 'GET',
                data: { item_name: selectedItem },
                success: function(data) {
                    var result = JSON.parse(data);
                    $('#itemcode').val(result.item_code); // Set the item code in the input field
                }
            });
        }
    });

    // Validate if the input is from the autocomplete list only
    $('#itemname').change(function() {
        var enteredValue = $(this).val();
        if (!availableItems.includes(enteredValue)) {
            // Clear the input field or show an error
            alert('Please select a valid item from the list.');
            $(this).val(''); // Clear the field
            $('#itemcode').val(''); // Clear the item code field
        }
    });
});

/*$(document).ready(function() {
    // Autocomplete functionality for item names
    $('#itemname').autocomplete({
        source: function(request, response) {
            // AJAX call to fetch item names based on user input
			//alert("here");
            $.ajax({
                url: 'get_item_names.php', // PHP script to fetch item names
                method: 'GET',
                data: { term: request.term }, // Send user input as the term
                success: function(data) {
				//alert(data);
                    response(JSON.parse(data)); // Parse and send the response to the autocomplete widget
                }
            });
        },
        minLength: 1, // Minimum characters before triggering autocomplete
        select: function(event, ui) {
            // When an item name is selected, auto-fetch the corresponding item code
            var selectedItem = ui.item.value;
            $.ajax({
                url: 'get_item_code.php', // PHP script to fetch the item code
                method: 'GET',
                data: { item_name: selectedItem },
                success: function(data) {
                    var result = JSON.parse(data);
                    $('#itemcode').val(result.item_code); // Set the item code in the input field
                }
            });
        }
    });
});*/
</script>

</body>
</html>
