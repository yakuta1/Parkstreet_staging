<?php include('core/init.php'); ?>
<?php $db = new Database; ?>


<?php 
 	
	
		
	$product = $_GET['product'];
	
		
		$db->query("
			SELECT * FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			WHERE products.product_id = '$product'"
		);
		
$result = $db->resultset();



?>
<table class='table table-hover table-bordered'>
							<thead>
								<th>#</th>
								<th>Invoice Number</th>
								<th>Invoice Date</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total</th>
							</thead>
							<tbody>
<?php 
	static $counter = 1;

?>
<?php foreach($result as $res) : ?>
	<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $res->invoice_num; ?></td>
		<td><?php echo $res->invoice_date; ?></td>
		<td><?php echo $res->product_description; ?></td>	
		<td><?php echo $res->qty; ?></td>
		<td><?php echo $res->price; ?></td>
		<td><?php echo  ($res->qty)*($res->price); ?></td>	
	</tr>
<?php $counter++; ?>
	
<?php endforeach; ?>
</tbody>
</table>
							
							
							