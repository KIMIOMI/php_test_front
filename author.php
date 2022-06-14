<?php
require_once 'lib/print.php';

$conn = mysqli_connect('localhost', 'root', 'mysql123', 'opentutorials');

$sql = "select * from author";
$result = mysqli_query($conn, $sql);

if($result === false) {
	echo '리스트를 불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
	error_log("\n".date("Y-m-d H:i:s")."	".mysqli_error($conn), '3', 'error.log');
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>
			<?php print_title(); ?>
		</title>
	</head>
	<body>
		<h1><a href="index.php">WEB</a></h1>
		<h2>
			<a href="index.php">topic</a>
		</h2>
		<table border="2" cellspacing="1">
			<tr>
			<td>id</td>	<td>name</td>	<td>profile</td>
			</tr>
		<?php
		while($row = mysqli_fetch_array($result)){
			$filtered = array(
				'id'=>htmlspecialchars($row['id']),
				'name'=>htmlspecialchars($row['name']),
				'profile'=>htmlspecialchars($row['profile'])
			);
		?>
			<tr>
				<td><?=$filtered['id']?></td>
				<td><?=$filtered['name']?></td>
				<td><?=$filtered['profile']?></td>
				<td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
				<td>
					<form action="delete_author_process.php" method="post"
						  onsubmit="if(!confirm('sure?')){return false;}">
						<input type="hidden" name="id" value="<?=$filtered['id']?>">
						<input type="submit" value="delete">
					</form>
				</td>
			</tr>
		<?php
		} 
		?>
		</table>	
		
		<?php
		$author_name = 'name';
		$author_profile = 'profile';
		$action = 'create_author_process.php';
		$label_submit = 'Create author';
		$form_id = '';
		if(isset($_GET['id'])){
			$filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
			settype($filtered_id, 'integer');
			$sql = "select * from author where id = {$filtered_id}";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$author_name = htmlspecialchars($row['name']);
			$author_profile = htmlspecialchars($row['profile']);
			$action = 'update_author_process.php';
			$label_submit = 'Update author';
			$form_id = '<input type ="hidden" name="id" value="'.$filtered_id.'">';
		}
		?>
		
		<form class="" action="<?=$action?>" method="post">
			<?=$form_id?>
			<p><input type="text" name="name" placeholder="Name" value = "<?=$author_name?>"> </p>
			<p><textarea name="profile" placeholder="profile"><?=$author_profile?></textarea></p>
			<p><input type = "submit" value="<?=$label_submit?>"></p>
		</form>

<?php
require_once 'view/bottom.php';
 ?>