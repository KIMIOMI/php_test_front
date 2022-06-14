<?php
$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');
// var_dump($_POST);
settype($_POST['id'], 'integer');
$filtered = array(
	'id' => mysqli_real_escape_string($conn, $_POST['id']),
	'title' => mysqli_real_escape_string($conn, $_POST['title']),
	'description' => mysqli_real_escape_string($conn, $_POST['description'])
);
$sql = "update topic set title = '{$filtered['title']}', description = '{$filtered['description']}' where id = {$filtered['id']}";

// echo $sql;
$result = mysqli_query($conn, $sql);
if($result === false) {
	echo '업데이트 하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
	error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
} else {
	echo '성공했습니다. <a href="index.php">돌아가기.</a>';	
}
// rename('data/'.$_POST['old_title'], 'data/'.$_POST['title']);

// file_put_contents('data/'.$_POST['title'], $_POST['description']);
// header('Location: /index.php?id='.$_POST['title']);
 ?>
