<?php
// include database connection file
require_once'bbmconfig.php';
if(isset($_POST['update']))
{
// Get the row id
$id=$_GET['id'];
// Posted Values 
$id=$_POST['id'];
$dna=$_POST['d_na'];
$dag=$_POST['d_ag'];
$dge=$_POST['d_ge'];
$dbg=$_POST['d_bg'];
$dpn=$_POST['d_pn'];
$dlo=$_POST['d_lo'];




// Store  Procedure for Updation
$sql=mysqli_query($con,"call EditDonor('$id','$dna','$dag','$dge','$dbg','$dpn','$dlo')");
// Mesage after updation
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record updated successfully');</script>";
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
<h3>EDIT Donor Details</h3>
<hr />
</div>
</div>

<?php 
// Get the userid
$did=$_GET['id'];
$sql =mysqli_query($con, "call RowDonor('$did')");
while ($result=mysqli_fetch_array($sql)) {                 
?>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>DonorID</b>
<input type="text" name="id" value="<?php echo htmlentities($result['DonorID']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>DonorName</b>
<input type="text" name="d_na" value="<?php echo htmlentities($result['DonorName']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Age</b>
<input type="text" name="d_ag" value="<?php echo htmlentities($result['Age']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Gender</b>
<input type="text" name="d_ge" value="<?php echo htmlentities($result['Gender']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Blood_Group</b>
<input type="text" name="d_bg" value="<?php echo htmlentities($result['Blood_Group']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>PhoneNo</b>
<input type="text" name="d_pn" value="<?php echo htmlentities($result['PhoneNo']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Location</b>
<input type="text" name="d_lo" value="<?php echo htmlentities($result['Location']);?>" class="form-control" required>
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