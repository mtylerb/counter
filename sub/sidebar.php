<?php if (Dispatcher::getAction() != 'view'): ?>
<p class="button"><a href="<?php echo get_url('plugin/counter/add'); ?>"><img src="<?php echo URL_PUBLIC; ?>/wolf/plugins/counter/images/add_download.png" align="middle" alt="snippet icon" />Add Download</a></p>
<p class="button"><a href="<?php echo get_url('plugin/counter/template'); ?>"><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/counter/images/template.png" align="middle" alt="snippet icon" />Template</a></p>
<p class="button"><a href="<?php echo get_url('plugin/counter/boot'); ?>"><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/counter/images/import.png" align="middle" alt="snippet icon" />Import/Export/Install</a></p>
<div class="box">
<h2>What is Bd Download Manager for?</h2>
<p>
You can use the download manager in many ways, like counting the downloads of your files or counting the links on you site, etc.<br /><br />
<a href="http://www.tbeckett.net/articles/plugins/counter.xhtml">Docs</a>
</p>
</div>
<?php endif; ?>
