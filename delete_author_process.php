<?php
$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');
// print_r($_POST);
$filtered_id = mysqli_real_escape_string($conn, $_POST['id']);

$sql = "delete from topic where author_id = {$filtered_id}";
$result = mysqli_query($conn, $sql);
$sql = "delete from author where id = {$filtered_id}";
// die ($sql);
// echo $sql;
$result = mysqli_query($conn, $sql);
if($result === false) {
	echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
	error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
} else {
	header('Location:author.php');	
}
// file_put_contents('data/'.$_POST['title'], $_POST['description']);
// header('Location: /index.php?id='.$_POST['title']);
 ?>
