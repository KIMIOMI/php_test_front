<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<h1>WEB</h1>
		<ol>
			<li><a href="index.php?id=HTML">HTML</a> </li>
			<li><a href="index.php?id=CSS">CSS</a></li>
			<li><a href="index.php?id=JavaScript">JavaScript</a></li>
		</ol>
		<h2>
			<?php
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					echo $id;
				} else {
					echo "Welcom";
				}
			?>
		</h2>
		<h2>
			<?php
			if(isset($id)){
				echo file_get_contents("data/".$id);
			} else {
				echo "Hello, PHP";
			}
			 ?>
		</h2>
	</body>
</html>
