<?php
$PDO = Record::getConnection();
$action = $_POST['action'];
if($_POST['action'] != "") {
if($action == "INSTALL") {
  $PDO->exec("DROP TABLE IF EXISTS download;");
  $PDO->exec("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."download (
  id int(15) NOT NULL auto_increment,
  linkname varchar(50) collate latin1_general_ci NOT NULL,
  linkurl varchar(100) collate latin1_general_ci NOT NULL,
  linkdescription varchar(1000) collate latin1_general_ci NOT NULL,
  linkpassword varchar(24) collate latin1_general_ci NOT NULL,
  downloads int(15) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;");

$PDO->exec("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."download_template (
  id int(15) NOT NULL auto_increment,
  template varchar(1000) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;");

$PDO->exec("INSERT INTO ".TABLE_PREFIX."download_template (id, template) VALUES
(1, '<h3><?php \$bdcounter->title(); ?></h3>\r\n<strong>Description</strong><br />\r\n<i><?php \$bdcounter->description(); ?></i><br /><br />\r\n<?php \$bdcounter->password(); ?>\r\n<strong>Download:</strong> <a href=\"<?php \$bdcounter->url(); ?>\"><?php \$bdcounter->title(); ?></a> <br />\r\n<strong>Downloaded:</strong> <?php \$bdcounter->counts(); ?><strong> times</strong> <br />\r\n<strong>Type:</strong> <?php \$bdcounter->type(); ?></strong> <br />\r\n<br />');");
print "Bd Download Manager has been installed.<br />";
print TABLE_PREFIX."download has been created.<br />";
print TABLE_PREFIX."download_template has been created.<br />";
print "Happy downloading.<br /><br />";
}
elseif($action == "IMPORT"){
	
	$sql = $_POST['sql_import'];
	if($sql != "") {
		$pdo = Record::getConnection();
		$stmt = $pdo->prepare($sql);
		$stmt->execute($sql);
	}
	
}
elseif($action == "EXPORT"){
	function export() {
	$result = mysql_query('SELECT COUNT(*) FROM download');
	$array = mysql_fetch_array($result);
	$sql_num = $array[0] - 1;
	$sql = mysql_query("SELECT * FROM download LIMIT ".$sql_num."");
	print '<textarea class="textarea" name="sql_export">';
	print "INSERT INTO ".TABLE_PREFIX."download (id, linkname, linkurl, downloads) VALUES ";
	while($download = mysql_fetch_array($sql)) {
		print"('".$download['id']."', '".$download['linkname']."', '".$download['linkurl']."', '".$download['downloads']."'),";
	}
	$sql = mysql_query("SELECT * FROM download ORDER BY id desc");
	$download = mysql_fetch_array($sql);
	print"('".$download['id']."', '".$download['linkname']."', '".$download['linkurl']."', '".$download['downloads']."')";
	print ";";
	print '</textarea>';
	}
}
else {
	print $action." is not a valid command.";
}
}
?>
<form action="<?php echo get_url('plugin/counter/boot'); ?>" method="POST">
	<div class="form-area">
	<p class="title">
	<label for="action">Action: </label>
	<input type="text" name="action" class="textbox" <?php if($action == "IMPORT") { ?>value="IMPORT"<?php } ?> size="30">
<?php if($action == "EXPORT") { ?>
	<label for="export">Export SQL: </label>
<?php export(); ?>
<?php } ?>
<?php if($action == "IMPORT") { ?>
	<label for="export">IMPORT SQL: </label>
	<textarea class="textarea" name="sql_import"></textarea>
<?php } ?>
	</p>	
	</div>
	<p class="buttons">
	<input class="button" name="action_button" type="submit" value="Go">
	<input class="button" type="reset" value="Reset">
	</p>
</form>