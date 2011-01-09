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

Plugin::setInfos(array(
    'id'          => 'counter',
    'title'       => 'Download Manager', 
    'description' => 'Download and Link Manager.', 
    'version'     => '1.0.3', 
    'license'     => 'AGPL',
    'author'      => 'BebliucDesign and Tyler Beckett',
    'website'     => 'http://www.tbeckett.net',
    'update_url'  => 'http://www.tbeckett.net/wpv.xhtml',
    'require_wolf_version' => '0.6.0')
);

Plugin::addController('counter', 'Counter');

// Setting error display depending on debug mode or not
error_reporting((DEBUG ? (E_ALL | E_STRICT) : 0));

class bdcounter {
	
	var $id;
	var $password;
	
	function bdcounter($id) {
		$this->id = $id;
	}
	
	 function description() {
				$sql = "SELECT * FROM ".TABLE_PREFIX."download WHERE id='".$this->id."'";
                $pdo = Record::getConnection();
				$stmt = $pdo->prepare($sql);
                $stmt->execute();
                $download = $stmt->fetchObject();
    	print $download->linkdescription;
		
	}
	
    function counts() {
				$sql = "SELECT * FROM ".TABLE_PREFIX."download WHERE id='".$this->id."'";
                $pdo = Record::getConnection();
				$stmt = $pdo->prepare($sql);
                $stmt->execute();
                $download = $stmt->fetchObject();
		print $download->downloads;
	
	}
	
	function password() {
				$sql = "SELECT * FROM ".TABLE_PREFIX."download WHERE id='".$this->id."'";
                $pdo = Record::getConnection();
				$stmt = $pdo->prepare($sql);
                $stmt->execute();
                $download = $stmt->fetchObject();

		$password = $download->linkpassword;
		$this->password = $password;
		if($this->password != "") {
		if(isset($_POST['password_button']) && $_POST['linkpassword'] == $password ) {
			echo "<font color='green'>Happy download.</font><br />";
			
		}
		else
		{
			echo "<font color='red'>This file is password protected.</font><br />";
			print '<form method="POST" action=""><input type="text" name="linkpassword" class="textinput"><input type="submit" name="password_button" value="Submit"></form>';
		}
		}
	}
	
	function url($url_class = "download_url", $_url_id = "download_url") {
		if($_POST['linkpassword'] == $this->password ) {
		print URL_PUBLIC.'wolf/plugins/counter/sub/download.php?id='.$this->id;
		
		}
	}
	
	function title() {
				$sql = "SELECT * FROM ".TABLE_PREFIX."download WHERE id='".$this->id."'";
                $pdo = Record::getConnection();
				$stmt = $pdo->prepare($sql);
                $stmt->execute();
                $download = $stmt->fetchObject();
    		print $download->linkname;
	}
	
	function type() {
		$sql = "SELECT * FROM ".TABLE_PREFIX."download WHERE id='".$this->id."'";
        $pdo = Record::getConnection();
		$stmt = $pdo->prepare($sql);
        $stmt->execute();
		$download = $stmt->fetchObject();
		$url = $download->linkurl;
		$type = explode(".",$url);
		$type = $type[count($type)-1];
		print strtoupper($type);
		
	}
	
	function size(){
	    $sql = "SELECT * FROM ".TABLE_PREFIX."download WHERE id='".$this->id."'";
	    $pdo = Record::getConnection();
		$stmt = $pdo->prepare($sql);
	    $stmt->execute();
	    $download = $stmt->fetchObject();
	    $url = $download->linkurl;

	    $parsed = parse_url($url);
	    $host = $parsed["host"];
	    $fp = @fsockopen($host, 80, $errno, $errstr, 20);
	    if(!$fp)return false;
	    else {
	 	    @fputs($fp, "HEAD $url HTTP/1.1\r\n");
		    @fputs($fp, "HOST: $host\r\n");
		    @fputs($fp, "Connection: close\r\n\r\n");
		    $headers = "";
		    while(!@feof($fp))$headers .= @fgets ($fp, 128);
	    }
	    @fclose ($fp);
	    $return = false;
	    $arr_headers = explode("\n", $headers);
	    foreach($arr_headers as $header) {
		    $s = "Content-Length: ";
		    if(substr(strtolower ($header), 0, strlen($s)) == strtolower($s)) {
			    $return = trim(substr($header, strlen($s)));
			    break;
		    }
	    }
	    if($return){
				   $size = round($return / 1024, 0);
				   $sz = "KB"; // Size In KB
			 if ($size > 1024) {
				 $size = round($size / 1024, 0);
				 $sz = "MB"; // Size in MB
			 }
			 $return = "$size $sz";
	   }
	   print $return;
	   
	}
}

function dcounter($id) {
	
	$bdcounter = new bdcounter($id);
	$sql = "SELECT * FROM ".TABLE_PREFIX."download_template";
        $pdo = Record::getConnection();
		$res = $pdo->prepare($sql);
        $res->execute();
        $download = $res->fetchObject(); 
	print eval("?>".$download->template);
	
}
