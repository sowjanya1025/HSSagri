<!DOCTYPE html>
<html>
<head>
    <title>Print Example</title>
<style>
        @media print {
            .print-button {
                display: none;
            }
        }
		</style>	
</head>
<body>

<?php
// Data to be printed
echo "<h1>Invoice</h1>";
echo "<p>Customer Name: John Doe</p>";
echo "<p>Product: Web Hosting Package</p>";
echo "<p>Amount: $99.99</p>";
?>
<form method="POST">
    <label for="quantity">Select Quantity:</label>
    <select name="quantity" id="quantity">
        <optgroup label="Grams">
            <option value="100">100 gms</option>
            <option value="200">200 gms</option>
            <option value="300">300 gms</option>
            <option value="400">400 gms</option>
            <option value="500">500 gms</option>
            <option value="600">600 gms</option>
            <option value="700">700 gms</option>
            <option value="800">800 gms</option>
            <option value="900">900 gms</option>
        </optgroup>
        <optgroup label="Kilograms">
            <option value="1">1 kg</option>
            <option value="2">2 kg</option>
            <option value="3">3 kg</option>
            <option value="4">4 kg</option>
            <option value="5">5 kg</option>
        </optgroup>
    </select>
    <br>
    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the selected quantity
    $quantity = $_POST['quantity'];

    // Check whether it's in grams or kilograms
    if ($quantity < 1) {
        $quantityLabel = $quantity * 1000 . " grams"; // If less than 1, convert to grams
    } else {
        $quantityLabel = $quantity . " kilograms"; // 1 or greater is kilograms
    }

    echo "You selected: " . $quantityLabel;
}
?>

<!-- Print button -->
<button class="print-button" onClick="window.print()">Print</button>

</body>
</html>
