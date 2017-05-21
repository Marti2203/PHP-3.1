<?php
/*
 * View.php
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
	include 'Base.php';
	
	PrintStatus("View.php?ID=".$_GET['ID']);
	
	$topic=Find($_GET['ID'],"Topic")[0];
	
		print "<form method=\"post\" action=\"CreateQuestion.php\">
			<input type=\"submit\" class=\"button\" id=\"View\" value=\"CreateQuestion\">";
			if(isset($_COOKIE['forum']))
			print"
			<label for=\"hidden\" class=\"label\">Hidden</label><input type=\"checkbox\" name=\"hidden\" value=\"Yes\"> ";
			print"<input type=\"hidden\" name=\"Topic_ID\" value=\"".$_GET['ID']."\"/>
			<input type=\"text\"  name=\"Question\"/></form>";
	
	print "<h1 align=\"center\">".$topic['Text']."</h1>";
	
	$questions=FindAllFiltered("Question","Topic_ID=:topicID",array(":topicID"=>$topic['ID']));
	
	print "<table style=\"width:100%\">";
	
	foreach($questions as $question)
	{
		if($question['IsHidden']==1 && !isset($_COOKIE['forum'])) continue;
		
		print "<tr>";
		print "<th>".$question['Text']."</th>
			<th><form method=\"post\" action=\"CreateComment.php\">
			<textarea rows=\"4\" cols=\"50\" name=\"Text\"> </textarea>
			<input type=\"submit\" id=\"View\" value=\"Reply\">
			<input type=\"hidden\" name=\"Topic_ID\" value=\"".$_GET['ID']."\"/>
			<input type=\"hidden\" name=\"Question_ID\" value=\"".$question['ID']."\"/>
			</form></th>";
			
		if(isset($_COOKIE['forum']) && !$_COOKIE['outsider'])
			$ismod=FindAllFiltered("User","Username=:username",array(":username"=>$_COOKIE['forum']))[0]['UserType_ID']>1;
		else $ismod=false;
				
		if($ismod)
		print "<th>".Remove("Question","View.php?ID=".$_GET['ID'],$question['ID'])."</th>";
		
		$comments=FindAllFiltered("Comment","Question_ID=:id",array(":id"=>$question['ID']));
		print "<th><ul style=\"list-style-type:none\">";
		
		foreach($comments as $comment)
		print "<li>".$comment['Text'].
		(isset($comment['User_ID'])? ("-----".Find($comment['User_ID'],"User")[0]['Username']) : "" ). 
		($ismod ? Remove("Comment","View.php?ID=".$_GET['ID'],$comment['ID']): "") ."</li>";
		
		print "</ul></th>";
		print "</tr>"; 
	}
			print "</table>";
	?>
</body>

</html>
