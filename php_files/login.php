<?php
// include database connection file
require_once'bbmconfig.php';
if(isset($_POST['login']))
{
// Posted Values  
$m_id=$_POST['aid'];
$pd=$_POST['pas'];
//Call the store procedure for insertion
$sql=mysqli_query($con,"call login('$m_id','$pd')");
$row=mysqli_num_rows($sql);
if($row==1)
{
//Successfull insertion
echo "<script>alert('login successfully');</script>";
echo "<script>window.location.href='bbsystem.php'</script>"; 
}
else 
{
//Unsuccessfull insertion
echo "<script>alert('login unsuccesfull');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Staff Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body
style="background-image: url('download.png');
background-size: 20% 25%;
background-repeat: no-repeat;
background-attachment: fixed;
background-position:  84% 20%;
">
<a href="index.php"><button class="btn btn-success">Previous Page</button></a>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>LOGIN PAGE</h3>
<hr />
</div>
</div>

<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Staff Login ID</b>
<input type="text" name="aid" class="form-control" required>
</div>
</div> 
<div class="row">
<div class="col-md-4"><b>Password</b>

<input id="password-field" type="password" name="pas" class="form-control" required>
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-pas"></span>
</div> 
</div> 

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="login" value="Submit">
</div>
</div> 
</form>
     
</div>
</div>
</body>
</html>