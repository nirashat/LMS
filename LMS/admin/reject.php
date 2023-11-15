<?php
require('dbconn.php');

$bookid=$_GET['id1'];

$rollno=$_GET['id2'];

$sql="delete from LMS.record where id='$rollno' and id='$bookid'";

if($conn->query($sql) === TRUE)
{
	$sql1="insert into LMS.message (RollNo,Msg,Date,Time) values ('$rollno','Your request for issue of BookId: $bookid  has been rejected',curdate(),curtime())";
 $result=$conn->query($sql1);
echo "<script>alert('Success')</script>";
header( "Refresh:0.01; url=issue_requests.php", true, 303);
}
else
{
	echo "<script>alert('Error')</script>";
    header( "Refresh:0.01; url=issue_requests.php", true, 303);

}




?>