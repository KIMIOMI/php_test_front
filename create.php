<?php
//require_once 'lib/print.php';
require 'view/top.php';
$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');

$sql = "select * from author";
$result = mysqli_query($conn, $sql);

if($result === false) {
	echo '리스트를 불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
	error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
}
// } else {
	// $row = mysqli_fetch_array($result);
	

 ?>
<form class="" action="create_process.php" method="post">
	<p><input type="text" name="title" placeholder="Title"></p>
	<p><textarea name="description" placeholder="description"></textarea></p>
	<select name = "author_id"> <?php while($row = mysqli_fetch_array($result)){
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';

	} ?> </select>
	<p><input type="submit"></p>
</form>
<?php
require 'view/bottom.php';
 ?>
