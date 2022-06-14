<?php
$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');
// var_dump($_POST);
settype($_POST['id'], 'integer');
$filtered = array(
	'id' => mysqli_real_escape_string($conn, $_POST['id']),
);
$sql = "delete from topic where id = {$filtered['id']}";

// echo $sql;
$result = mysqli_query($conn, $sql);
if($result === false) {
	echo '삭제 하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
	error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
} else {
	echo '성공했습니다. <a href="index.php">돌아가기.</a>';	
}
// unlink('./data/'.basename($_POST['id']));
// header('Location: /index.php');
 ?>
