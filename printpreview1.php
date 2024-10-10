<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-header, .invoice-details, .sku-list {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-header th, .invoice-header td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .sku-list th, .sku-list td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .invoice-header {
            margin-bottom: 20px;
        }
        .total {
            text-align: right;
        }
    </style>
</head>
<body>

    
    
    <table class="invoice-header">
		<tr><td colspan="2"><h2>MOKSH ENTERPRISES PRIVATE LIMITED</h2></td></tr>
        <tr>
            <td>
                <strong>Collection Centre:</strong> Chikballapur CC<br>
                <strong>Address:</strong> No-128 P18 & 19, Budigere cross, near Mandur village, Bangalore, Karnataka - 560049
            </td>
            <td>
                <strong>Farmer Name:</strong> Nadipi Raghuveera Reddy Mothuka Palli (FAR13477)<br>
                <strong>Date:</strong> 24/08/2024
            </td>
        </tr>
        <tr>
            <td>
                <strong>Generated at:</strong> 24/08/2024 10:14:18 PM
            </td>
            <td>
                <strong>Invoice No.:</strong> 338016, <strong>Purchase Order No.:</strong> 338016
            </td>
        </tr>
    </table>
    
    <h3>SKU List</h3>
    <table class="sku-list">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Product Name</th>
                <th>Graded Qty</th>
                <th>Uom</th>
                <th>Unit Price</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Green Chilli (Hari Mirch)</td>
                <td>230.0</td>
                <td>kg</td>
                <td>38.0</td>
                <td>8740.0</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="total"><strong>Total Amount</strong></td>
                <td>8740.0</td>
            </tr>
            <tr>
                <td colspan="6"><strong>Total Amount in Words:</strong> Eight Thousand Seven Hundred Forty Only</td>
            </tr>
        </tfoot>
    </table>
	<button onclick="window.print()">Print</button>

</body>
</html>

</body>
</html>
