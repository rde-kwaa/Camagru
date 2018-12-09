<?php

echo('<div class="wrap">
        <img src='.$row['photo_P'].' class="gallyview"/>
      </div>
      <div class="wrap"> Likes: '.$row['likes_P'].'
      </div>
      <div class="wrap">
		<form name="likewut">
			<input type="checkbox" id="likebox" onclick="ajaxPOST(\'like\');" onChange="this.form.submit()" /> <label for="likebox"></label>
			<input type="hidden" id="pidiot" name="pid" value='.$row['id_P'].'>
			<input type="hidden" id="uidiot" name="uid" value='.$id.'>
        </form>
	  </div>
	  <h3 class="comh">Leave a comment:</h3>
	  <input type="text" name="comment" id="comedy" placeholder="Write something...">
      <button type="submit" onclick="ajaxPOST(\'comments\');" name="com-mit">Submit Comment</button>
      <h1>Comments:</h1>');

	$sql = "SELECT * FROM `tbl_comms` INNER JOIN `tbl_users` ON `idu_C` = `id_U` WHERE `id_P` = :pid";
	if (!($stmt = $conn->prepare($sql))) {
		header("Location: ../gallery.php?error=sqlerror");
		exit();
		} else {
			$stmt->execute([':pid'=>$_GET['pid']]);
			while ($row = $stmt->fetch()) {
				echo('<p class="comm">'.$row['comm_C'].'</p>');
				echo('<p class="user">'.$row['uid_U'].'</p>');
			}
		}
	$stmt = null;
	$conn = null;
?>
