<?php
// include database connection file
require_once'bbmconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Blood Bank Staff Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
<a href="bbsystem.php"><button class="btn btn-success">Previous Page</button></a>
<a href="index.php"><button class="btn btn-success">Log Out</button></a>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Staff Page</h3> <hr />
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">
<thead>
<th>#</th>
<th>Staff ID</th>
<th>Staff Name</th>
<th>Hospital ID</th>
</thead>
<tbody>
<?php
$sql =mysqli_query($con, "call StaffDetails()");
$cnt=1;
$row=mysqli_num_rows($sql);
if($row>0){
while ($result=mysqli_fetch_array($sql)) {
?>
<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php echo htmlentities($result['StaffID']);?></td>
<td><?php echo htmlentities($result['StaffName']);?></td>
<td><?php echo htmlentities($result['HospID']);?></td>

</tr>
<?php
// for serial number increment
$cnt++;
} } else { ?>
<tr>
<td colspan="9" style="color:red; font-weight:bold;text-align:center;"> No Record found</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>
