<?php
$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');
// print_r($_POST);
$filtered_title = mysqli_real_escape_string($conn, $_POST['title']);
$filtered_description = mysqli_real_escape_string($conn, $_POST['description']);
$filtered_authorid= mysqli_real_escape_string($conn, $_POST['author_id']);
$sql = "insert into topic (title, description, created, author_id) values('$filtered_title',
'$filtered_description', NOW(), $filtered_authorid)";
// die ($sql);
// echo $sql;
$result = mysqli_query($conn, $sql);
if($result === false) {
	echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
	error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
} else {
	echo '성공했습니다. <a href="index.php">돌아가기.</a>';	
}
// file_put_contents('data/'.$_POST['title'], $_POST['description']);
// header('Location: /index.php?id='.$_POST['title']);
 ?>
