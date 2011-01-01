# [Download Manager Plugin](http://www.tbeckett.net/articles/plugins/counter.xhtml)

## License

This plugin is dually licensed under the MIT and GPL license models.  For more information view the license_overview.txt file in the license folder.

## About Download Manager Plugin

Hello everyone.  Today I'm releasing my latest plugin, the Download Manager.  I say Manager instead of Counter, because I've almost fully rewritten the code.  Many modifications were made and new features were added.  So I thought it deserved the name "Manager".  I tried to make this plugin available quicker, but I encountered some little problems, which in the end became big ones.  One of them was the possibility of keeping the current downloads from the older version while upgrading, because I've modified the structure of the MySQL tables.  You'll see that it's a bit rusty.  Some of the new features are:

* Better administration interface, more user friendly.
* Possibility to edit the entries after submitting
* Template support.
* Import/Export/Backup possibility

## Installation

The installation is different.  If you plan to install it, and never used Download Counter ( this is Download Manager), you have to follow this steps:

1. Download the plugin
2. Extract it and copy it's content in the plugin directory , so it will be something like wolf/plugins/counter/index.php
3. Go to Administration -> Plugins -> Download Manager and activate it.
4. Click on Counter Tab and select Import/Export/Install from the sidebar.
5. A field named ACTION will appear. Type "INSTALL" in it, without quotes. It's case sensitive, so please insert the text uppercase.
6. If all worked ok, this message should be shown :
7. Download Manager has been installed.
8. download has been created.
9. download_template has been created.

Happy downloading.  That's all.  Now all you have to do is add some downloads or links to count.

## Upgrading

For updating from a older version of Bd Download Counter or Bd Download Manager to Download Manager, please follow the instructions below:

1. DELETE COUNTER FOLDER FROM PLUGINS DIRECTORY.
2. COPY BD DOWNLOAD MANAGER IN THE PLUGINS DIRECTORY.
3. ACTIVATE THE PLUGIN.
4. CLICK ON THE NEW "COUNTER" TAB.
5. CLICK ON IMPORT/EXPORT/INSTALL BUTTON FROM THE SIDEBAR.
6. IN THE ACTION FIELD INSERT "EXPORT" , WITHOUT BRACKETS.
7. HIT GO.
8. COPY SOMEWHERE SAFE THE SQL SYNTAX FROM THE "EXPORT SQL" TEXTAREA.
9. CLICK ON IMPORT/EXPORT/INSTALL BUTTON FROM THE SIDEBAR.
10. IN THE ACTION FIELD INSERT "INSTALL" , WITHOUT BRACKETS.
11. HIT GO .
12. THIS MESSAGE SHOULD APPEAR :
   Download Manager has been installed.
   download has been created.
   download_template has been created.
   Happy downloading.
13. CLICK ON IMPORT/EXPORT/INSTALL BUTTON FROM THE SIDEBAR.
14. IN THE ACTION FIELD INSERT "IMPORT", WITHOUT BRACKETS.
15. PASTE THE EXPORTED SQL SYNTAX FROM STEP 8 .
16. HIT GO.

## Template System

As you can see, I've added a new feature, the template system.  What is it about? For me, as a designer, I need my code to be very flexible.  With flexibility I can adapt it very easily to any site.  The Bd Download Counter only had 2 CSS classes which you couldn't change without modifying the PHP code from within the plugin.  Not every designer is comfortable doing that, neither is the average user.  With this new feature, you can modify the output of the Download Manager very easily.  These tags can be used in the template:

`<?php $bdcounter->title(); ?>` => Download title

`<?php $bdcounter->url(); ?>` => Download url (for usage with the download title)

`<?php $bdcounter->description(); ?>` => Download description

`<?php $bdcounter->password(); ?>` => Download password protection field

`<?php $bdcounter->type(); ?>` => Download type (ex: Rar, Zip)

`<?php $bdcounter->counts(); ?>` => Number of downloads

The default template uses them all, but none of them are required. You can post only the download link.

### Conditional Tags in Template

Here is a very simple demonstration of how to use the Conditional tags (if/else) in the template.
Example: Hide the description if the field is empty.

    <?php
    
    	if ($bdcounter->description() != "") {
    
    ?>

    Description<br />
    
    <?php
    
		$bdcounter->description();
    
    ?>
    
    <?php
    
	    }
    
    ?>

## Usage

The usage is exactly like in the previous version.  You just have to place `<?php dcounter('1'); ?>` where you want your download link to appear, just as you've configured it in the template feature.  Instead of the #, place the ID of the download.  You can get the ID by clicking on the title of the download in the administration panel.  It should be named: "Old link template".

That's it!  Feedback is welcome, as usual.  Thanks.
