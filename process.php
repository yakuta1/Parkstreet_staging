<?php include('core/init.php'); ?>
<?php $db = new Database; ?>


<?php 
 	
	$yearfilter = $_POST['yearfilter'];
	$client = $_POST['client'];	
	$product = $_POST['product'];
	
	if ($client !== '' AND $product !== '' AND $yearfilter == ''){
			$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE products.product_id = '$product' AND clients.client_id = '$client'" 
		);
	} elseif ($client !== '' AND $yearfilter == '' AND $product == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE clients.client_id = '$client'" 
		);
	}
	
	///////
	elseif ($yearfilter == '2' AND $product == '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(MONTH(invoices.invoice_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND YEAR(invoices.invoice_date) = YEAR(NOW())) 
			OR 
			(MONTH(invoices.invoice_date) = MONTH(NOW())AND YEAR(invoices.invoice_date) = YEAR(NOW()))" 
		);
	}
	elseif ($yearfilter == '2' AND $product !== '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			((MONTH(invoices.invoice_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND YEAR(invoices.invoice_date) = YEAR(NOW())) 
			OR 
			(MONTH(invoices.invoice_date) = MONTH(NOW())AND YEAR(invoices.invoice_date) = YEAR(NOW())))
			AND
			products.product_id = '$product'" 
		);
	}
	elseif ($yearfilter == '2' AND $product == '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			((MONTH(invoices.invoice_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND YEAR(invoices.invoice_date) = YEAR(NOW())) 
			OR 
			(MONTH(invoices.invoice_date) = MONTH(NOW())AND YEAR(invoices.invoice_date) = YEAR(NOW())))
			AND
			clients.client_id = '$client'" 
		);
	}
	elseif ($yearfilter == '2' AND $product !== '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			((MONTH(invoices.invoice_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND YEAR(invoices.invoice_date) = YEAR(NOW())) 
			OR 
			(MONTH(invoices.invoice_date) = MONTH(NOW())AND YEAR(invoices.invoice_date) = YEAR(NOW())))
			AND
			clients.client_id = '$client' 
			AND
			products.product_id = '$product'"
		);
	}
	
	/////
	elseif ($yearfilter == '3' AND $product == '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE MONTH(invoices.invoice_date) = MONTH(NOW()) AND YEAR(invoices.invoice_date) = YEAR(NOW())" 
		);
	}
	
	elseif ($yearfilter == '3' AND $product !== '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(MONTH(invoices.invoice_date) = MONTH(NOW()) 
			AND YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			products.product_id = '$product'" 
		);
	}
	
	elseif ($yearfilter == '3' AND $product == '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(MONTH(invoices.invoice_date) = MONTH(NOW()) 
			AND YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			clients.client_id = '$client'" 
		);
	}
	
	elseif ($yearfilter == '3' AND $product !== '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(MONTH(invoices.invoice_date) = MONTH(NOW()) 
			AND YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			clients.client_id = '$client' 
			AND
			products.product_id = '$product'" 
		);
	}
	
	//////////////
	
		elseif ($yearfilter == '4' AND $product == '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE YEAR(invoices.invoice_date) = YEAR(NOW())" 
		);
	}
	
	elseif ($yearfilter == '4' AND $product !== '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			products.product_id = '$product'" 
		);
	}
	
	elseif ($yearfilter == '4' AND $product == '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			clients.client_id = '$client'" 
		);
	}
	
	elseif ($yearfilter == '4' AND $product !== '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE YEAR(invoices.invoice_date) = YEAR(NOW())
			AND
			clients.client_id = '$client' 
			AND
			products.product_id = '$product'" 
		);
	}
	
	/////////
	elseif ($yearfilter == '5' AND $product == '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			YEAR(invoices.invoice_date) = YEAR(DATE_ADD(NOW(), INTERVAL -1 YEAR))
			OR YEAR(invoices.invoice_date) = YEAR(NOW())
			" 
		);
	}
	
	elseif ($yearfilter == '5' AND $product !== '' AND $client == ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(YEAR(invoices.invoice_date) = YEAR(DATE_ADD(NOW(), INTERVAL -1 YEAR))
			OR 
			YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			products.product_id = '$product'
			" 
		);
	}
	elseif ($yearfilter == '5' AND $product == '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(YEAR(invoices.invoice_date) = YEAR(DATE_ADD(NOW(), INTERVAL -1 YEAR))
			OR YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			clients.client_id = '$client'
			" 
		);
	}
	
	elseif ($yearfilter == '5' AND $product !== '' AND $client !== ''){
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE 
			(YEAR(invoices.invoice_date) = YEAR(DATE_ADD(NOW(), INTERVAL -1 YEAR))
			OR YEAR(invoices.invoice_date) = YEAR(NOW()))
			AND
			clients.client_id = '$client' 
			AND
			products.product_id = '$product'
			" 
		);
	}
	
	//////////
	else{
	$db->query("
			SELECT *
			FROM invoices
			INNER JOIN invoicelineitems ON invoices.invoice_num = invoicelineitems.invoice_num
			INNER JOIN products ON invoicelineitems.product_id = products.product_id
			INNER JOIN clients ON products.client_id = clients.client_id
			WHERE products.product_id = '$product'" 
		);}
		
	
		
$result = $db->resultset();



?>
<div class="alert alert-block">Records Found: <?php echo $db->rowCount(); ?></div>
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
	$nrow = $db->rowCount();
?>
<?php if($nrow == 0) { ?><tr class="danger"><td colspan="7"><?php echo "No Result Found";?></td></tr><?php } else {?>
<?php foreach($result as $res) : ?>
	<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $res->invoice_num; ?></td>
		<td><?php echo $res->invoice_date; ?></td>
		<td><?php echo $res->product_description; ?></td>	
		<td><?php echo $res->qty; ?></td>
		<td><?php echo $res->price; ?></td>
		<td><?php echo number_format($res->price*$res->qty,2); ?></td>	
	</tr>
<?php $counter++; ?>
<?php endforeach; }?>
</tbody>
</table>