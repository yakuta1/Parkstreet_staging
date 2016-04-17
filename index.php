<?php include('core/init.php'); ?>
<?php $db = new Database; ?>
<?php $db1 = new Database ?>
<?php
$db->query("SELECT * FROM clients");
$result = $db->resultset();
$db1->query("SELECT * FROM products");
$result1 = $db1->resultset();
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/custom.css">
		<script src="js/jquery-min.js"></script>
		<script>
			$(document).ready(function() {
		
			// process the form
			$('#filterForm').submit(function(event) {

				// get the form data
				var formData = {
					'yearfilter'              : $('#yearfilter').val(),
					'client'             : $('#client').val(),
					'product'    : $('#product').val()
				};

				// process the form
				$.ajax({
					type        : 'POST', 
					url         : 'process.php', 
					data        : formData, 
					dataType    : 'html',
					success  	: function(html){
													$('#mainContent').empty();
													$('#loader').show().delay(600).hide();
													$('#mainContent').append(html);
												}
							   
				})
					
					.done(function(data) {

						
						console.log(data); 

					if ( ! data.success) {
					
							   
				} else {

					// ALL GOOD!
					$('#mainContent').append('<div class="alert alert-success">' + data.message + '</div>');

						}
					});

				// stop the form from submitting the normal way and refreshing the page
				event.preventDefault();
			});
			return false;
		});

		</script>
        
    </head>
    <body>
        
		<div class="container-fluid">
				
			<div class="row col-lg-9 centered">	
				
				<div class="col-lg-6">	
					<img class="psilogo wow fadeInLeftBig" src="img/psilogo.png" alt="logo" />
				</div>	<!-- End of Col Div-->
				
				
				<div class="col-lg-6">	
					<div class="page-header">
						<h1 class="wow fadeInRightBig"><span data-wow-delay="2s" class="wow flash">Invoice History</span></h1>
					</div>					
				</div>	<!-- End of Col Div-->
			
			</div>	<!-- End of Row Div-->
			<div class="row col-lg-9 centered wow fadeInUpBig" data-wow-delay="1s">
				
				<div class="col-lg-3">	
				
					<form id="filterForm" method="POST" action="process.php">
						  <div class="form-group">
							<label>Filter By Date</label>
							<p>
								<select name="yearfilter" id="yearfilter">
									<option value="" disabled selected>Choose Date</option>
									<option value="2">Last Month to Date</option>
									<option value="3">This Month</option>
									<option value="4">This Year</option>
									<option value="5">Last Year</option>
								</select>
							</p>	
						  </div>
						 
					
					
											
				</div>	<!-- End of Col Div-->		
				
				<div class="col-lg-3">	
				
					
						  <div class="form-group">
							<label>Filter By Client</label>
							<p>
								<select name="client" id="client">
									<option value="" disabled selected>Choose Cient</option>
									<?php foreach($result as $res) : ?>
										<option value="<?php echo $res->client_id;?>"><?php echo $res->client_name;?></option>
									<?php endforeach; ?>
								</select>
							</p>	
						  </div>
					
					
											
				</div>	<!-- End of Col Div-->	
				
				
				<div class="col-lg-6">	
				
					
						  <div class="form-group">
							<label>Filter By Product</label>
							<p>
								<select name="product" id="product">
									<option value="" disabled selected>Choose Product</option>
									<?php foreach($result1 as $res) : ?>
										<option value="<?php echo $res->product_id;?>"><?php echo $res->product_description;?></option>
									<?php endforeach; ?>
								</select>
							</p>
						  </div>
						 
					
											
				</div>	<!-- End of Col Div-->	
				<div class="row"> 
						  <div class="col-lg-1"><button type="submit" class="btn btn-danger" id="submit_button" >Submit</button></div>
						  <div class="col-lg-1"><button type="reset" class="btn btn-success" id="submit_button" >Reset Filter</button></div>
						 </div>
						  
					</form>
			</div>	<!-- End of Row Div-->	
			
			<div class="row">
				
				<div class="col-sm-9 centered">

					<div id="loader">
					
						<img src="img/ajax-loader.gif" alt="ajax loader" />
					
					</div> <!-- End of loading -->
					
										
					<div id="mainContent">
						
					</div> <!-- End of Main Content -->
				
				
				</div>	<!-- End of Col Div-->		
				
			</div>	<!-- End of Row Div-->	
			
		</div> <!-- End of Container Div-->	

        <script src="js/bootstrap.min.js"></script>
        
		<script src="js/wow.min.js"></script>
        <script src="js/myscript.js"></script>
	
    </body>
</html>
