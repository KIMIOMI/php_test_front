<?php
require 'lib/print.php';
require 'view/top.php';
 ?>
    <h2>
      <form class="" action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
  			<p><input type="text" name="title" placeholder="Title" value="<?php print_title(); ?>"></p>
  			<p><textarea name="description"><?php print_data(); ?></textarea></p>
  			<p><input type="submit"></p>

  		</form>
    </h2>
<?php
require 'view/bottom.php';
 ?>
