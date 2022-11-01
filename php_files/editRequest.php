<?php
// include database connection file
require_once'bbmconfig.php';
if(isset($_POST['update']))
{
// Get the row id
$id=$_GET['id'];
// Posted Values 
$id=$_POST['id'];
$rna=$_POST['r_na'];
$rda=$_POST['r_da'];
$rbg=$_POST['r_bg'];
$rq=$_POST['r_q'];
$rhi=$_POST['r_hi'];





// Store  Procedure for Updation
$sql=mysqli_query($con,"call EditRequest('$id','$rna','$rda','$rbg','$rq','$rhi')");
// Mesage after updation
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record updated successfully');</script>";
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
    <title>Blood Request Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
<div class="col-md-12">
<h3>EDIT Blood Request Details</h3>
<hr />
</div>
</div>

<?php 
// Get the userid
$reid=$_GET['id'];
$sql =mysqli_query($con, "call RowRequest('$reid')");
while ($result=mysqli_fetch_array($sql)) {                 
?>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Request ID</b>
<input type="text" name="id" value="<?php echo htmlentities($result['RequestID']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Patient Name</b>
<input type="text" name="r_na" value="<?php echo htmlentities($result['PatientName']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Request Date</b>
<input type="text" name="r_da" value="<?php echo htmlentities($result['RequestDate']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Required Blood Group</b>
<input type="text" name="r_bg" value="<?php echo htmlentities($result['RequiredBloodGroup']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Required Quantity</b>
<input type="text" name="r_q" value="<?php echo htmlentities($result['RequiredQuantity']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Hospital ID</b>
<input type="text" name="r_hi" value="<?php echo htmlentities($result['HospID']);?>" class="form-control" required>
</div>

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