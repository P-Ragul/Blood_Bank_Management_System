<?php
// include database connection file
require_once'bbmconfig.php';
if(isset($_POST['update']))
{
// Get the row id
$pid=$_GET['id'];
// Posted Values 
$pbdq=$_POST['bd_q'];
$pst=$_POST['st_'];




// Store  Procedure for Updation
$sql=mysqli_query($con,"call EditBloodStock('$pid','$pbdq','$pst')");
// Mesage after updation
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record updated successfully');</script>";
echo "<script>window.location.href='bloodstockdetails.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='bloodstockdetails.php'</script>"; 
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blood Stock Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
<div class="col-md-12">
<h3>EDIT Blood Stock</h3>
<hr />
</div>
</div>

<?php 
// Get the userid
$stid=$_GET['id'];
$sql =mysqli_query($con, "call RowStock('$stid')");
while ($result=mysqli_fetch_array($sql)) {                 
?>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Blood Quantity</b>
<input type="text" name="bd_q" value="<?php echo htmlentities($result['BloodQuantity']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Availability of Blood Stock</b>
<input type="text" name="st_" value="<?php echo htmlentities($result['Status']);?>" class="form-control" required>
</div>
</div>
</div> 
<?php } ?>

<div class="row" style="margin-left:12%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div> 
</form>
</div>
</div>

</body>
</html>