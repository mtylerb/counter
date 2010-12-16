<h1>Add a new download</h1>
<form name="add_download_form" action="<?php echo get_url('plugin/counter/public_add/'); ?>" method="post">
<div class="form-area">
	<p class="title">
	<label for="linkname">Link name: </label>
	<input class="textbox" type="text" id="linkname" name="linkname" size="30"><br>
	<label for="linkname">Downloads url: </label>
	<input class="textbox" type="text" id="linkurl"  name="linkurl" size="30"><br>
	<label for="linkdescription">Description: </label>
	<textarea class="textarea" id="linkdescription"  name="linkdescription"></textarea><br>
	<label for="linkname">Password <span style="font-size:10px; color:#FFF; font-style:italic;">(leave empty if you don't want a protected link)</span> </label>
	<input class="textbox" type="password" id="linkpassword"  name="linkpassword" size="30"><br>
</div>
<p class="buttons">
<input class="button" name="add_download" type="submit" value="Add Download">
<input class="button" type="reset" value="Reset Form">
</p>
</form>