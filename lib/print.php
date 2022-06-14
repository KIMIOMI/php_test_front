<?php
$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');
if(isset($_GET['id'])){
	$basename = basename($_GET['id']);
	$sql = "select * from topic left join author on topic.author_id = author.id where topic.id=$basename";
	$result = mysqli_query($conn, $sql);
	if($result === false) {
		echo '리스트를 불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
		error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
	} else {
		$row = mysqli_fetch_array($result);
		$article = array(
			'title' => mysqli_real_escape_string($conn, $row['title']),
			'description' => mysqli_real_escape_string($conn, $row['description']),
			'name' => mysqli_real_escape_string($conn, $row['name'])
		);
		// print_r($article);
	}
	// echo htmlspecialchars(file_get_contents("data/".$basename));
} else {
	$article = array(
			'title' => "WEB",
			'description' => "Hello, PHP"
		);
}
function print_title(){
	global $conn;
	
	global $article;
	
	echo $article['title'];
}

function print_list()
{
	global $conn;
	$sql = "select * from topic";
	$result = mysqli_query($conn, $sql);
	if($result === false) {
		echo '리스트를 불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
		error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
	} else {
		while($row = mysqli_fetch_array($result)){
			$filtered_article = array(
				'title' => mysqli_real_escape_string($conn, $row['title']),
				'id' => mysqli_real_escape_string($conn, $row['id'])
			);
			echo "<li><a href=\"index.php?id={$filtered_article['id']}\">{$filtered_article['title']}</a></li>";
		}
	}


	// $list    = scandir('./data');
	// $i = 0;
	// while($i < count($list)) {
	// 	$title = htmlspecialchars($list[$i]);
	// 	if ($list[$i] != '.' and $list[$i] != '..') {
	// 		echo "<li><a href=\"index.php?id=$title\">$title</a></li>\n";
	// 	}
	// 	$i += 1;
	// }
}
function print_data()
{
	global $conn;
	global $article;
	
	echo $article['description'].'<br>';
	echo $article['name'];
}
 ?>
