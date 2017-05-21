<?php
/*
 * Register.php
 * 
 * Copyright 2017 "" <Martin@DESKTOP-2T5PNPN>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
		<?php
		include 'Base.php';

		$errors=array();
		CheckValid($errors);
		 
		if(count($errors)===0){
			
			$type=1;
			if(isset($specialUsers[$_POST['username']]))
			$type=$specialUsers[$_POST['username']];
			
		InsertUser($_POST['username'],sha1($_POST['password']),$_POST['email'],$type);
		setcookie("forum",$_POST['username'],time()+(86400 * 30),"/3.1/");
	 }
	 	else for($x = 0; $x < count($errors); $x++) echo $errors[$x]."<br>";
	sleep(6);
	header("Location:".$_POST['Location']);
		?>
</body>

</html>