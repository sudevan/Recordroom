<?php
include("connection.php");
$id=$_GET['id'];
$filenumber=$_GET['filenumber'];
$year=$_GET['year'];
$section=$_GET['section'];
$date=$_GET['date'];
$subject=$_GET['subject'];
$name=$_GET['name'];
$bundlenumber=$_GET['bundlenumber'];

$sql="UPDATE rec_record_master set filenumber='$filenumber',year='$year',section='$section',subject='$subject' where id='$id'";
$result=$conn->query($sql);
if($result)
{
	$sql="UPDATE rec_person set name='$name' where id='$id'";
	$result=$conn->query($sql);
	if ($result) {
		$sql="UPDATE rec_bundle_record set bundlenumber='$bundlenumber' where recordid='$id'";
		if ($conn->query($sql)) {
			echo "updated record";
			echo 1;
		}
	}
} else {
	echo 0;
}
?>