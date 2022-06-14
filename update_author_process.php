<?php
$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');
// print_r($_POST);
$filtered_id = mysqli_real_escape_string($conn, $_POST['id']);
$filtered_name = mysqli_real_escape_string($conn, $_POST['name']);
$filtered_profile = mysqli_real_escape_string($conn, $_POST['profile']);

$sql = "update author set name = '{$filtered_name}', profile = '{$filtered_profile}' where id={$filtered_id}";
// die ($sql);
// echo $sql;
$result = mysqli_query($conn, $sql);
if($result === false) {
	echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
	error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
} else {
	header("Location:author.php?id={$filtered_id}");	
}
// file_put_contents('data/'.$_POST['title'], $_POST['description']);
// header('Location: /index.php?id='.$_POST['title']);
 ?>
