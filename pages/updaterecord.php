<?php
include("connection.php");
$id=$_GET['id'];
$filenumber=$_GET['filenumber'];
$year=$_GET['year'];
$section=$_GET['section'];
$date=$_GET['date'];
$subject=$_GET['subject'];
$name=$_GET['name'];
$tag=$_GET['tag'];
$bundlenumber=$_GET['bundlenumber'];
$location=$_GET['location'];

$sql="UPDATE rec_record_master set filenumber='$filenumber',year='$year',section='$section',subject='$subject' where id='$id'";
$result=$conn->query($sql);
if($result)
{
	echo"successfully updated";
} else {
	echo "error occured";
}
?>