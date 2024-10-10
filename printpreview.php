<?php
session_start();
include'account.php';
$account =  new account();
$accountId=$account->getCurrentUserId(); 

if(!isset($_SESSION['user_id']))
{
	header("Location:index.php");
}


if(isset($_GET['id']))
{
	$pid = $_GET['id'];
}
$itemdata = $account->getGoodsReceive_noteByID($accountId,$pid);
//print_r($itemdata);
date_default_timezone_set('Asia/Kolkata');
$cdate=date("d/m/Y");
$today = date("d/m/Y g:i a");
$tot = $itemdata['totamt']; 

function numberToWords($num) {
 $num = intval($num);
    $ones = [
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen'
    ];

    $tens = [
        0 => '',
        2 => 'Twenty',
        3 => 'Thirty',
        4 => 'Forty',
        5 => 'Fifty',
        6 => 'Sixty',
        7 => 'Seventy',
        8 => 'Eighty',
        9 => 'Ninety'
    ];

    $thousands = [
        0 => '',
        1 => 'Thousand',
        2 => 'Million',
        3 => 'Billion'
    ];

    if ($num == 0) {
        return 'Zero';
    }

    $numStr = (string)$num;
    $numStr = str_pad($numStr, ceil(strlen($numStr) / 3) * 3, '0', STR_PAD_LEFT); // Pad the number for 3-digit chunks
    $chunks = str_split($numStr, 3); // Split into chunks of 3 digits

    $wordParts = [];
    foreach ($chunks as $index => $chunk) {
        $chunk = (int)$chunk; // Convert each chunk to an integer
        if ($chunk === 0) {
            continue;
        }

        $hundreds = (int)($chunk / 100); // Get the hundreds place
        $remainder = $chunk % 100; // Get the remainder for tens and ones
        $chunkWords = '';

        if ($hundreds > 0) {
            $chunkWords .= $ones[$hundreds] . ' Hundred ';
        }

        if ($remainder < 20 && $remainder > 0) {
            // Handle numbers between 0 and 19
            $chunkWords .= $ones[$remainder] . ' ';
        } else {
            // Handle numbers 20 and above
            $tensValue = (int)($remainder / 10);
            $onesValue = $remainder % 10;

            if ($tensValue > 0) {
                $chunkWords .= $tens[$tensValue] . ' ';
            }

            if ($onesValue > 0) {
                $chunkWords .= $ones[$onesValue] . ' ';
            }
        }

        $thousandIndex = count($chunks) - $index - 1;
        $chunkWords = trim($chunkWords);
        if (!empty($chunkWords)) {
            $chunkWords .= ' ' . $thousands[$thousandIndex];
            $wordParts[] = trim($chunkWords);
        }
    }

    return implode(', ', $wordParts);
}

// Example usage:
//echo numberToWords(3025); // Output: Three Thousand, Twenty Five

// Example usage:
//echo numberToWords(123456789); // Output: One Hundred Twenty Three Million, Four Hundred Fifty Six Thousand, Seven Hundred Eighty Nine
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once('header.php'); ?>
  <title>Approved-Rejected Goods</title>
  <style>
    
 .invoice
 {
 	width:75%
  }
  .invoice td { border:2px solid black; padding: 8px;text-align: left; } 
  .invoice th { border:2px solid black; padding: 8px;text-align: center; }
  .sku-list { width:75% }
  .sku-list td { border:2px solid black; padding: 8px;text-align: center; } 
  .sku-list th { border:2px solid black; padding: 8px;text-align: center; }
  .total {
            text-align: center;
        }
  
  @media print {
            .print-button {
                display: none;
            }
			.printsidebar
			{
				display: none;
			}
			#inv
			{
				border:none;
			}
			#porder
			{
				border:none;
			}
        } 
  </style>
</head>
<body>
  <!-- start wrapper -->
  <div class="wrapper">
  <div class="printsidebar">
    <?php require_once('side_bar.php'); ?>
	</div>
    <div id="content">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-bars"></i><span> Toggle Sidebar</span>
          </button>
        </div>
      </nav>
      <br><br>
      <div id="carbon-block" class="my-3"></div>
	  	 
    <div class="container">
	<div class="table-responsive">
	<table class="invoice" style="border:2px solid black">
    <tr>
      <th colspan="2"><?php echo ENTERPRISE_NAME ; ?></th>
    </tr>
  <tbody>
    <tr>
      <td width="50%"> <strong>Collection Centre:</strong> <?php echo htmlspecialchars($itemdata['collection_center']); ?><br></td>
      <td width="50%"><strong>Farmer Name:</strong> <?php echo htmlspecialchars($itemdata['farmers_name']); ?>(<?php echo htmlspecialchars($itemdata['frcode']); ?>)<br></td>
    </tr>
    <tr>
      <td><strong>Address:</strong> <?php echo ENTERPRISE_ADDRESS ; ?></td>
      <td><strong>Date:</strong> <?php echo $cdate; ?></td>
    </tr>
	<tr>
      <td><strong>Generated at:</strong> <?php echo $today; ?></td>
      <td><strong>Invoice No.:</strong><input type="text" id="inv" name="inv" value="338016">,<br> <strong>Purchase Order No.:</strong> <input type="text" id="porder" name="porder" value="4567" size="10"></td>
    </tr>
    
  </tbody>
</table>
<br>
<table class="sku-list">
        <thead>
		<tr>
      		<th colspan="6" >SKU list</th>
    	</tr>
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
                <td><?php echo htmlspecialchars($itemdata['item_name']); ?></td> 
                <td><?php echo htmlspecialchars($itemdata['quantity']); ?></td>
                <td>kgs</td>
                <td><?php echo htmlspecialchars($itemdata['price']); ?></td>
                <td><?php echo htmlspecialchars($itemdata['totamt']); ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="total">Total Amount</td>
                <td><?php echo htmlspecialchars($itemdata['totamt']); ?></td>
            </tr>
            <tr>
                <td colspan="6"><b>Total Amount in Words:</b><?php echo numberToWords($tot);?></td>
            </tr>
        </tfoot>
    </table>
<br>
<button class="print-button btn btn-dark"  onClick="window.print()">Print</button>&nbsp;<button  class="print-button  btn btn-dark" ><a href="approvereject_goods.php">Back</a></button>
        </div>
    </div>
    </div>
  </div>
<?php require_once('footer.php'); ?>
  <script>
    $(document).ready(function() {
	
      $("#sidebarCollapse").on('click',function() {
        $("#sidebar").toggleClass('active');
      });
	  
	 $('.deleteitemdata').click(function() { 
		let ccid = $(this).attr('id');
		$('#del_cmp_id').val(ccid);
 
	 });
	 
    });
  </script>
</body>
</html>
