<?php
/*
 * Create.php
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
					<link rel="stylesheet" type="text/css" href="styles.css">
	<meta name="generator" content="Geany 1.27" />
</head>

<body>
	<form method="post" action="Register.php">
	
	<label for="username" class="label">User Name</label>
				<input type="text" name="username" class="username" /><br>
	<label for="password" class="label">Password</label>
				<input type="password" name="password" class="password" /><br>
	<label for="passwordRetyped" class="label">Repeat Password</label>
				<input type="password" name="passwordRetyped" class="passwordRetyped" /><br>			
	<label for="email" class="label">Email</label>
				<input type="text" name="email" class="email" /><br>
	<input type="hidden" name="Location" value=" <?php print $_POST['Location'] ?> "/>
	<input type="submit" name="Register" value="Register" />
	
	
	</form>
</body>

</html>
