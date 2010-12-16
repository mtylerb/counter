<?php
	$link = "SELECT * FROM ".TABLE_PREFIX."download_template";
	$pdo = Record::getConnection();
	$stmt = $pdo->prepare($link);
	$stmt->execute();
	$r = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h1>Preferences</h1>
<form name="add_download_form" action="<?php echo get_url('plugin/counter/template_edit/'); ?>" method="post">
<div>
	<p><label for="template">Template: </label></p>
	<p>Usage:</p>
	<span style="font-size:12px; color:#0000BB;">&lt;?php $bdcounter->title(); ?&gt;</span>  <span style="font-size:12px;">Download title</span><br />
	<span style="font-size:12px; color:#0000BB;">&lt;?php $bdcounter->url(); ?&gt;</span>  <span style="font-size:12px;">Download url (for usage with the download title)</span><br />
	<span style="font-size:12px; color:#0000BB;">&lt;?php $bdcounter->description(); ?&gt;</span>  <span style="font-size:12px;">Download description</span><br />
	<span style="font-size:12px; color:#0000BB;">&lt;?php $bdcounter->password(); ?&gt;</span>  <span style="font-size:12px;">Download password protection field</span><br />
	<span style="font-size:12px; color:#0000BB;">&lt;?php $bdcounter->type(); ?&gt;</span>  <span style="font-size:12px;">Download type (ex: Rar, Zip)</span><br />
	<span style="font-size:12px; color:#0000BB;">&lt;?php $bdcounter->counts(); ?&gt;</span>  <span style="font-size:12px;">Number of times downloaded</span><br />
	<span style="font-size:12px; color:#0000BB;">&lt;?php $bdcounter->size(); ?&gt;</span>  <span style="font-size:12px;">Size, in Kb or Mb, of download</span><br /><br />
	<p>How to use</p>
	<span style="font-size:12px;"><span style="color:#FFF;">THE $BDCOUNTER->PASSWORD :</span> There is no certain rule to use the $bdcounter->password(); . I suggest to place it above the $bdcounter->url(); .</span><br />
	<span style="font-size:12px;"><span style="color:#FFF;">THE $BDCOUNTER->URL() and $BDCOUNTER->TITLE() :</span> Here is a very simple example of how to generate the download link:<br /><pre>
<code><span style="color: #000000">
&lt;a&nbsp;href="<span style="color: #0000BB">&lt;?php&nbsp;$bdcounter</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">url</span><span style="color: #007700">();&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&nbsp;class="download_url"&gt;<span style="color: #0000BB">&lt;?php&nbsp;$bdcounter</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">title</span><span style="color: #007700">();</span><span style="color: #0000BB">?&gt;</span>&lt;/a&gt;</span>
</code>
</pre></span>
	<textarea class="textarea" id="template"  name="template"><?php echo htmlentities($r['template']); ?></textarea><br>
</div>
<p class="buttons">
<input class="button" name="edit_template" type="submit" value="Edit template">
</p>
