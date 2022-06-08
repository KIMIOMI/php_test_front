<?php
	function print_title(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			echo htmlspecialchars($id);
		} else {
			echo "Welcom";
		}
	}
	function print_list()
	{
		$list    = scandir('./data');
		$i = 0;
		while($i < count($list)) {
			$title = htmlspecialchars($list[$i]);
			if ($list[$i] != '.' and $list[$i] != '..') {
				echo "<li><a href=\"index.php?id=$title\">$title</a></li>\n";
			}
			$i += 1;
		}
	}
	function print_data()
	{
		if(isset($_GET['id'])){
			$basename = basename($_GET['id']);
			echo htmlspecialchars(file_get_contents("data/".$basename));
		} else {
			echo "Hello, PHP";
		}
	}
 ?>
