<?php
/*
 * index.php
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
	<?php 
	
	include "Base.php";
	
	PrintStatus();
	
	print "<form method=\"post\" action=\"CreateTopic.php\">
	<label for=\"Topic\" class=\"label\">Topic</label>
	<input type=\"text\" name=\"Topic\" class=\"Topic\"/>
	<input type=\"submit\" class=\"button\" id=\"Sign In\" value=\"Create Topic\"></form><br>";
	
	print "<h1 align=\"center\">Topics</h1>";
	
		print "<table style=\"width:100%\">";
		$result=FindAll("Topic");
		
		if(isset($_COOKIE['forum']) && !$_COOKIE['outsider'])
		$isadmin=FindAllFiltered("User","Username=:username",array(":username"=>$_COOKIE['forum']))[0]['UserType_ID']>2;
		else $isadmin=false;
		
		foreach($result as $row) 
		{
			print "<tr>";
			print "<th>".$row['Text']."</th>";
			print "<th><form method=\"get\" action=\"View.php\">
				<input type=\"submit\" id=\"View\" value=\"View Topic\">
				<input type=\"hidden\" name=\"ID\" value=\"".$row['ID']."\"/>
				</form></th>";
				if($isadmin)
			print "<th>".Remove("Topic","index.php",$row['ID'])."</th>";
		}
		
		print "</table>";
	
	?>
</body>

</html>
