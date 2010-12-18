<?php

/**
 * Download Manager Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/counter.xhtml>
 *
 * Since BD is no longer available, I have adopted and modified the files and will be re-hosting on http://www.tbeckett.net
 *
 * Copyright (C) 2007 - 2009 Bebliuc George Cristian <bebliuc.george@gmail.com>
 * Copyright (C) 2008 - 2011 Tyler Beckett <tyler@tbeckett.net>
 * 
 * Dual licensed under the MIT (/license/mit-license.txt)
 * and GPL (/license/gpl-license.txt) licenses.
 */

class CounterController extends PluginController
{
   var $path;
    var $fullpath;
    
    public function __construct()
    {
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/counter/sub/sidebar'));
    }
    
    public function index()
    {
        $this->display('counter/sub/index');
    }
 	
	public function add()
    {
        $this->display('counter/sub/add');
    }
    
    public function boot()
    {
        $this->display('counter/sub/boot');
    }
    
    public function public_add()
	{
		$linkname = mysql_escape_string($_POST['linkname']);
		$linkurl = mysql_escape_string($_POST['linkurl']);
		$linkdescription = mysql_escape_string($_POST['linkdescription']);
		$linkpassword = mysql_escape_string($_POST['linkpassword']);
		if(empty($_POST['linkname']) && empty($_POST['linkurl'])) {
		Flash::set('error', __('An error has occured while submiting the download!'));
		redirect(get_url('plugin/counter/index'));
		}
		else
		{
		$sql = "INSERT INTO ".TABLE_PREFIX."download (linkname, linkurl, linkdescription, linkpassword, downloads) VALUES ('".$linkname."', '".$linkurl."', '".$linkdescription."', '".$linkpassword."', '0')" ;  
		$pdo = Record::getConnection();
		$stmt = $pdo->prepare($sql);
        $stmt->execute();  
		Flash::set('success', __('"Download has been added!""'));
		redirect(get_url('plugin/counter/index'));
		}	    	
    }
    
    function remove($id)
    {
		$sql = mysql_query("DELETE FROM ".TABLE_PREFIX."download WHERE id='".$id."'");
		$pdo = Record::getConnection();
		$stmt = $pdo->prepare($sql);
        $stmt->execute();
        Flash::set('success', __('The download has been deleted succesfully.'));
        redirect(get_url('plugin/counter/index'));
    }
    
    public function edit($id)
    {
        $this->display('counter/sub/edit', array(
            'id' => $id
        ));
    }
    public function public_edit()
	{
		$id = mysql_escape_string($_POST['linkid']);
		$linkname = mysql_escape_string($_POST['linkname']);
		$linkurl = mysql_escape_string($_POST['linkurl']);
		$linkdescription = mysql_escape_string($_POST['linkdescription']);
		$linkpassword =  mysql_escape_string($_POST['linkpassword']);
		if ($linkname == "" || $linkurl == "" || $id == "")
			{
				Flash::set('error', __('The download edit has occured an error.'));
				redirect(get_url('plugin/counter/edit/'.$id));
			}
		else 
			{
				$sql = "UPDATE ".TABLE_PREFIX."download SET 		`linkname`='".$linkname."',`linkurl`='".$linkurl."',`linkdescription`='".$linkdescription."',`linkpassword`='".$linkpassword."' WHERE id='".$id."'";
				$pdo = Record::getConnection();
				$stmt = $pdo->prepare($sql);
				$stmt->execute();  
				Flash::set('success', __('The download has been edited.'));
				redirect(get_url('plugin/counter/index'));
			}
	
	
	}
	
	public function template()
    {
        $this->display('counter/sub/preferences', array(
            'id' => $id
        ));
    }
    public function template_edit()
    {
    	$template = mysql_escape_string($_POST['template']);
    	if($template == "")
	    	{
	    		Flash::set('error', __('The template edit has occured an error.'));
				redirect(get_url('plugin/counter/template/'));
	    	}
	    else
	    	{
	    		$sql = "UPDATE ".TABLE_PREFIX."download_template SET `template`='".$template."'";
	    		$pdo = Record::getConnection();
				$stmt = $pdo->prepare($sql);
				$stmt->execute();  
        		FLASH::set('success', __('The template has been edited succesfully'));
        		redirect(get_url('plugin/counter/template/'));
	    	}
    }
}
