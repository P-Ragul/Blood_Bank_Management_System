<?php
// include database connection file
require_once'bbmconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Blood Bank Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body  style="background-image: url('bb.jpg');
background-size: 500px ;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;">
<a href="index.php"><button class="btn btn-success">Logout</button></a>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Blood Bank Management System</h3> <hr />
<a href="bloodstockdetails.php"><button class="btn btn-success">Blood_Stock</button></a>
<h1></h1>
<a href="donordetails.php"><button class="btn btn-success"> Donor</button></a>
<h1></h1>
<a href="hospitaldetails.php"><button class="btn btn-success"> Hospital</button></a>
<h1></h1>
<a href="requestdetails.php"><button class="btn btn-success"> Request</button></a>
<h1></h1>
<a href="bloodbankstaffdetails.php"><button class="btn btn-success"> BloodBankStaff</button></a>
<h1></h1>

</div>
</div>
</div>
</div>
</body>
</html>