<?php
		$link = "SELECT * FROM ".TABLE_PREFIX."download WHERE id=".$id."";
        $pdo = Record::getConnection();
		$stmt = $pdo->prepare($link);
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h1>Edit <?php echo $r['linkname']; ?></h1>
<form name="add_download_form" action="<?php echo get_url('plugin/counter/public_edit'); ?>" method="post">
<div class="form-area">
	<p class="title">
	<label for="linkname">Link name: </label>
	<input class="textbox" type="text" id="linkname" name="linkname" value="<?php echo $r['linkname']; ?>" size="30"><br>
	<label for="linkname">Downloads url: </label>
	<input class="textbox" type="text" id="linkurl" name="linkurl" value="<?php echo $r['linkurl']; ?>" size="30"><br>
	<input type="hidden" name="linkid" value="<?php echo $r['id']; ?>">
	<label for="linkdescription">Description: </label>
	<textarea class="textarea" id="linkdescription"  name="linkdescription"><?php echo $r['linkdescription']; ?></textarea><br>
	<label for="linkname">Password <span style="font-size:10px; color:#FFF; font-style:italic;">(leave empty if you don't want a protected link)</span> </label>
	<input class="textbox" type="password" id="linkpassword" value="<?php echo $r['linkpassword']; ?>" name="linkpassword" size="30"><br>
</div>
<p class="buttons">
<input class="button" name="add_download" type="submit" value="Edit Download">
<input class="button" type="reset" value="Reset Form">
</p>
</form>
