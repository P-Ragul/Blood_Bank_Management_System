<?php
// include database connection file
require_once'bbmconfig.php';
if(isset($_POST['insert']))
{
// Posted Values  
$rid=$_POST['r_id'];
$rna=$_POST['r_na'];
$rda=$_POST['r_da'];
$rbg=$_POST['r_bg'];
$rq=$_POST['r_q'];
$rhi=$_POST['r_hi'];
// Call the store procedure for insertion
$sql=mysqli_query($con,"call CreateRequest('$rid','$rna','$rda','$rbg','$rq','$rhi')");
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='requestdetails.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='requestdetails.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Request Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Request Details</h3>
<hr />
</div>
</div>

<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>RequestID</b>
<input type="text" name="r_id" class="form-control" required>
</div>
<div class="col-md-4"><b>PatientName</b>
<input type="text" name="r_na" class="form-control" required>
</div>
<div class="col-md-4"><b>RequestDate(yyyy-mm-dd)</b>
<input type="text" name="r_da" class="form-control" required>
</div>
<div class="col-md-4"><b>RequiredBloodGroup</b>
<input type="text" name="r_bg" class="form-control" required>
</div>
<div class="col-md-4"><b>RequiredQuantity</b>
<input type="text" name="r_q" class="form-control" required>
</div>
<div class="col-md-4"><b>Hospital ID</b>
<input type="text" name="r_hi" class="form-control" required>
</div>
</div>  

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="insert" value="Submit">
</div>
</div> 
</form>
     
</div>
</div>
</body>
</html>