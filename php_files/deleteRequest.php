<?php
// include database connection file
require_once'bbmconfig.php';
// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$rid=$_GET['del'];

//Qyery for deletion
$sql =mysqli_query($con,"call DeleteRequest('$rid')");

echo "<script>alert('Record deleted');</script>";
// Code for redirection
echo "<script>window.location.href='requestdetails.php?'</script>"; 
}
?>