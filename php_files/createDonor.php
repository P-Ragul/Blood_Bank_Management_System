<?php
// include database connection file
require_once'bbmconfig.php';
if(isset($_POST['insert']))
{
// Posted Values  
$d_id=$_POST['did'];
$d_na=$_POST['dna'];
$d_ag=$_POST['dag'];
$d_ge=$_POST['dge'];
$d_bg=$_POST['dbg'];
$d_pn=$_POST['dpn'];
$d_lo=$_POST['dlo'];
// Call the store procedure for insertion
$sql=mysqli_query($con,"call CreateDonor('$d_id','$d_na','$d_ag','$d_ge','$d_bg','$d_pn','$d_lo')");
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='donordetails.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='donordetails.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Donor Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Donor Details</h3>
<hr />
</div>
</div>

<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>DonorID</b>
<input type="text" name="did" class="form-control" required>
</div>
<div class="col-md-4"><b>DonorName</b>
<input type="text" name="dna" class="form-control" required>
</div>
<div class="col-md-4"><b>Age</b>
<input type="text" name="dag" class="form-control" required>
</div>
<div class="col-md-4"><b>Gender</b>
<input type="text" name="dge" class="form-control" required>
</div>
<div class="col-md-4"><b>Blood_Group</b>
<input type="text" name="dbg" class="form-control" required>
</div>
<div class="col-md-4"><b>PhoneNo</b>
<input type="text" name="dpn" class="form-control" required>
</div>
<div class="col-md-4"><b>Location</b>
<input type="text" name="dlo" class="form-control" required>
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