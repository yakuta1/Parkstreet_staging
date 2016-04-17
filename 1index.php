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
		
		<script>
			function showTime(str) {
				if (str == "") {
					document.getElementById("mainContent").innerHTML = "";
					return;
				} else {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","script.php?yearfilter="+str,true);
					xmlhttp.send();
				}
			}
			
			function showClient(str) {
				if (str == "") {
					document.getElementById("mainContent").innerHTML = "";
					return;
				} else {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","script_client.php?client="+str,true);
					xmlhttp.send();
				}
			}
			
			function showProduct(str) {
				if (str == "") {
					document.getElementById("mainContent").innerHTML = "";
					return;
				} else {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("mainContent").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","script_product.php?product="+str,true);
					xmlhttp.send();
				}
			}
		</script>
        
    </head>
    <body>
        
		<div class="container-fluid">
				
			<div class="row">	
				
				<div class="col-lg-9 col-lg-offset-2">	
					
					<div class="page-header">
						<h1 class="wow fadeInLeftBig"><span data-wow-delay="2s" class="wow flash">Park Street Imports Invoice History</span></h1>
					</div>
					
				</div>	<!-- End of Col Div-->
			
			</div>	<!-- End of Row Div-->
			<div class="row col-lg-9 centered">
				
				<div class="col-lg-3">	
				
					<form>
						  <div class="form-group">
							<label>Filter By Date</label>
							<p>
								<select name="yearfilter" onchange="showTime(this.value)">
									<option value="" disabled selected>Choose Date</option>
									<option value="2">Last Month to Date</option>
									<option value="3">This Month</option>
									<option value="4">This Year</option>
									<option value="5">Last Year</option>
								</select>
							</p>	
						  </div>
						 <!-- <button type="submit" class="btn btn-danger" id="submit_button" >Submit</button>-->
					</form>
					
											
				</div>	<!-- End of Col Div-->		
				
				<div class="col-lg-3">	
				
					<form>
						  <div class="form-group">
							<label>Filter By Client</label>
							<p>
								<select name="client" onchange="showClient(this.value)">
									<option value="" disabled selected>Choose Cient</option>
									<?php foreach($result as $res) : ?>
										<option value="<?php echo $res->client_id;?>"><?php echo $res->client_name;?></option>
									<?php endforeach; ?>
								</select>
							</p>	
						  </div>
					</form>
					
											
				</div>	<!-- End of Col Div-->	
				
				
				<div class="col-lg-6">	
				
					<form>
						  <div class="form-group">
							<label>Filter By Product</label>
							<p>
								<select name="product" onchange="showProduct(this.value)">
									<option value="" disabled selected>Choose Product</option>
									<?php foreach($result1 as $res) : ?>
										<option value="<?php echo $res->product_id;?>"><?php echo $res->product_description;?></option>
									<?php endforeach; ?>
								</select>
							</p>
						  </div>
					</form>
					
											
				</div>	<!-- End of Col Div-->	
				
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
        <script src="js/jquery-min.js"></script>
		<script src="js/wow.min.js"></script>
        <script src="js/myscript.js"></script>
	
    </body>
</html>
