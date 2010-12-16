Hello everyone. Today I'm releasing my latest plugin, the Download Manager. Why I say Manager instead of Counter? Because I've almost fully rewrite the code, many modifications were made, new features were added. So I think it deserves the name, Manager. I tried to make this plugin available quicker, but I encountered some little problems, which in the end became big ones. One of them was the possibility to keep the current downloads from the older version while upgrading, because I've modified the structure of the MySQL tables. You'll see that it's a bit rusty. There are some new features like :

   Better administration interface, more user friendly.
   Possibility to edit the entries after submitting
   Template support.
   Import/Export/Backup possibility

Installation

The installation is different. If you plan to install it, and never used Download Counter ( this is Download Manager), you have to follow this steps:

   Download the plugin
   Extract it and copy it's content in the plugin directory , so it will be something like frog/plugins/counter/index.php
   Go to Administration -> Plugins -> Download Manager and activate it.
   Click on Counter Tab and select Import/Export/Install from the sidebar.
   A field named ACTION will appear. Type "INSTALL" in it, without quotes. It's case sensitive, so please insert the text uppercase.
   If all worked ok, this message should be shown :
   Download Manager has been installed.
   download has been created.
   download_template has been created.
   Happy downloading.
   That's all. Now all you have is add some downloads to count(or links).

For updating from a older version of Bd Download Counter or Bd Download Manager to Download Manager, please follow the instructions below:

   DELETE COUNTER FOLDER FROM PLUGINS DIRECTORY.
   COPY BD DOWNLOAD MANAGER IN THE PLUGINS DIRECTORY.
   ACTIVATE THE PLUGIN.
   CLICK ON THE NEW "COUNTER" TAB.
   CLICK ON IMPORT/EXPORT/INSTALL BUTTON FROM THE SIDEBAR.
   IN THE ACTION FIELD INSERT "EXPORT" , WITHOUT BRACKETS.
   HIT GO.
   COPY SOMEWHERE SAFE THE SQL SYNTAX FROM THE "EXPORT SQL" TEXTAREA.
   CLICK ON IMPORT/EXPORT/INSTALL BUTTON FROM THE SIDEBAR.
   IN THE ACTION FIELD INSERT "INSTALL" , WITHOUT BRACKETS.
   HIT GO .
   THIS MESSAGE SHOULD APPEAR :
   Download Manager has been installed.
   download has been created.
   download_template has been created.
   Happy downloading.
   CLICK ON IMPORT/EXPORT/INSTALL BUTTON FROM THE SIDEBAR.
   IN THE ACTION FIELD INSERT "IMPORT", WITHOUT BRACKETS.
   PASTE THE EXPORTED SQL SYNTAX FROM STEP 8 .
   HIT GO.

Template system

As you can see, I've added a new feature, the template system. What is it about? For me, as a designer, I need my code to be very flexible, so I can adapt it very easily to every site. The Bd Download Counter only had 2 CSS classes which you couldn't change without modifying the PHP code from the plugin. And that's not to comfortable for every designer, or normal user. With this new feature, you can modify the output of the Download Manager very easily. Here are the tags to use in the template:

<?php $bdcounter->title(); ?> => Download title

<?php $bdcounter->url(); ?> => Download url (for usage with the download title)

<?php $bdcounter->description(); ?> => Download description

<?php $bdcounter->password(); ?> => Download password protection field

<?php $bdcounter->type(); ?> => Download type (ex: Rar, Zip)

<?php $bdcounter->counts(); ?> => Number of downloads

The default template uses them all, but none of them are required. You can post only the download link.

Conditional tags in template

Here is a very simple demonstration of how to use the Conditional tags (if/else) in the template.
Example : Hide the description if the field is empty.

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


How to use

The usage is exactly like in the previous version. You just have to place <?php dcounter('1'); ?> where you want your download link to appear (as configured in the template feature) . Instead of 1 , you have to place the ID of the download. You get it by clicking on the title of the download in the administration panel. It should be named : "Old link template".

This is all. Feedback is welcome, as usual. Use the comment form if you have any questions. Thanks.
