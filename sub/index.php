<?php
//begining: display a list of downloads
	$sql = "SELECT * FROM ".TABLE_PREFIX."download";
	$pdo = Record::getConnection();
	$stmt = $pdo->prepare($sql);


?>
<h1>Downloads list</h1>
<ul id="snippets" class="index">
<?php
if(!$stmt->execute()) {
	echo 'Please first install the plugin.';
}
?>
<?php while($download = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<?php 	$url = $download['linkurl'];
		$type = explode(".",$url);
		$type = $type[count($type)-1];
		$type = strtoupper($type);
if($type == "COM" || $type == "ORG" || $type == "RO" || $type == "NET" || $type == "RU" || $type == "INFO" || $type == "DE" || $type == "BG" || $type == "US" || $type == ".uk.com") {
	$icon = "www.png";
}
elseif($type == "COM/" || $type == "ORG/" || $type == "RO/" || $type == "NET/" || $type == "RU/" || $type == "INFO/" || $type == "DE/" || $type == "BG/" || $type == "US/" || $type == ".UK.COM/") {
	$icon = "www.png";
}
elseif($type == "MP3" || $type == "AAC" || $type == "WMA" || $type == "WAV") {
	$icon = "mp3.png";
}
elseif($type == "PNG" || $type == "JPG" || $type == "JPEG" || $type == "BMP" || $type == "TIFF" || $type == "PSD"){
	$icon = "jpg.png";
}
elseif($type == "RAR" || $type == "ZIP" || $type == "7ZIP" || $type == "ACE" || $type == "TAR" || $type == "GZ"){
	$icon = "rar.png";		
}
elseif($type == "EXE" || $type == "BIN") {
	$icon = "exe.png";
}
elseif($type == "AVI" || $type == "MP4" || $type == "MPG" || $type == "MOV" || $type == "SWF" || $type == "WMV"){
	$icon = "avi.png";	
}
else {
	$icon = "unknown.png";
}
		?>
  <li id="snippet_<?php echo $tag->id; ?>" class="snippet node <?php echo odd_even(); ?>">
    <img align="middle" alt="snippet-icon" src="<?php echo URL_PUBLIC; ?>/wolf/plugins/counter/images/types/<?php echo $icon; ?>" />
  <a onclick="switchMenu('details<?php echo $download['id']; ?>');" style="cursor:pointer;"><?php echo $download['linkname']; ?> (<?php echo $download['downloads']; ?>)</a>
    <div class="remove"><a href="<?php echo get_url('plugin/counter/remove/'.$download['id']); ?>" onclick="return confirm('<?php echo __('Are you sure you wish to delete this download link?'); ?>');"><img src="../wolf/plugins/counter/images/delete.png" alt="remove icon" /></a>
    	<a href="<?php echo get_url('plugin/counter/edit/'.$download['id']); ?>"><img src="../wolf/plugins/counter/images/edit.png" alt="edit icon" /></a>
    </div>
    <div id="details<?php echo $download['id']; ?>" style="display:none;">
    <p class="details_box_text"><strong>Old link template:</strong> <code style="font-style:italic; font-size:9px;"><br /><span style="color: #000000">
	<span style="color: #0000BB">&lt;?php&nbsp;dcounter</span><span style="color: #007700">(</span><span style="color: #DD0000">'<?php echo $download['id']; ?>'</span><span 	style="color: #007700">);</span><span style="color: #0000BB">?&gt;</span>
	</span>
	</code></p>
	<p class="details_box_text" style="font-weight: bold;">Password:<br /><span style="font-style:italic; font-size:9px; color:#333;"><?php echo $download['linkpassword']; ?></span></p>
	<p class="details_box_text">Description:<br /> <span style="font-style:italic; font-size:9px; color:#333;"><?php echo $download['linkdescription']; ?></span></p>
    </div>
  </li>
<?php } ?>
</ul>
