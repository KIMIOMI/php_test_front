<?php
$mysqli=mysqli_connect("localhost", "root", "mysql123" , "opentutorials" ) or die("access denied.");
if($mysqli){
  echo 'MySQL 서버에 접속 성공';
}else{
  echo 'MySQL 서버에 접속 실패';
}
$sql = "inser into topic(title, description, created) values('mysql','mysql is ...', now())";
$selectsql = "select * from topic";
$result = mysqli_query($mysqli, $selectsql);
if (mysqli_error($mysqli)){
	echo 'sql error';
}
	
var_dump($result);
// $row = mysqli_fetch_assoc($result);
// echo $row[0];
?>