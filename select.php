<?php
echo "<h1>single row</h1>";
$conn = mysqli_connect('localhost','root', 'mysql123', 'opentutorials');
$sql = "select * from topic where id = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
// var_dump($row);
// print_r($row);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];

echo "<h1>multi row</h1>";
$sql = "select * from topic";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
	echo '<h2>'.$row['title'].'</h2>';
	echo $row['description'];	
}
?>