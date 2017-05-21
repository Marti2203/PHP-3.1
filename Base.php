<?php
/*
 * Base.php
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
<?php 
		include 'DB.php';	
		$specialUsers=array("martin_2203"=>3,"marti_2203"=>3,"KiroToshev"=>2,"MartinMirchev"=>2);

function InsertUser($username,$password,$email,$type)
{		Execute("Insert INTO User (Username,Password,Email,UserType_ID) Values (:username,:password,:email,:typeID)",
		array(":username"=>$username,":password"=>$password,":email"=>$email,":typeID"=>$type));
	}
function InsertTopic($topic){Execute("Insert INTO Topic (Text) Values (:text)",array(":text"=>$topic));}
function InsertQuestion($topic,$text,$username,$hidden)
{
	if($username==null)
	Execute("Insert INTO Question (Text,Topic_ID,User_ID) Values (:text,:topic_ID,NULL)",
	array(":text"=>$text,":topic_ID"=>$topic));
	else
	{ $user=FindAllFiltered("User","Username=:username",array(":username"=>$username));
			Execute("Insert INTO Question (Text,Topic_ID,User_ID,IsHidden) Values (:text,:topic_ID,:id,:hidden)",
	array(":text"=>$text,":topic_ID"=>$topic,":id"=>$user['ID'],":hidden"=>$hidden));
		}
	
	}	
function InsertComment($text,$questionID,$topicID,$userID)
{
	if($userID==null)
	Execute("INSERT INTO Comment (Text,Question_ID,Question_Topic_ID,User_ID) VALUES (:text,:questionID,:topicID,NULL)",
	array(":text"=>$text,":topicID"=>$topicID,":questionID"=>$questionID));
	
	else
	Execute("INSERT INTO Comment (Text,Question_ID,Question_Topic_ID,User_ID) VALUES (:text,:questionID,:topicID,:userID)",
	array(":text"=>$text,":topicID"=>$topicID,":userID"=>$userID,":questionID"=>$questionID));
}	
function Login($username,$password,&$result)
{
	$user=FindAllFiltered("User","Username=:username AND Password=:password",array(":username"=>$username,":password"=>$password))[0];
	if($user!=null)
	$result= $user['Username'];
} 
function Remove($type,$location,$id)
{
	return "<form method=\"post\" action=\"Remove.php\">
		<input type=\"hidden\" name=\"type\" value=\"".$type."\"/>
		<input type=\"hidden\" name=\"Location\" value=\"".$location ."\"/>
		<input type=\"submit\" value=\"Remove\"/>
		<input type=\"hidden\" name=\"ID\" value=\"".$id."\"/> </form> ";
}
function CheckValid(&$errors)
{
		if($_POST['password']!=$_POST['passwordRetyped'])
		array_push($errors,"Passwords are not same.");
		 
		if(count(FindAllFiltered("User","Username=:username",array(":username"=>$_POST['username'])))!=0)
		array_push($errors,"Existing User");
		 
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
		array_push($errors,"Invalid Email");
	}
	
function PrintStatus($location="index.php")
{
	if(isset($_COOKIE['forum']))
	print "<label class=\"label\">Logged in as ".$_COOKIE['forum']."</label>	
			<form method=\"post\" action=\"LogOut.php\">
			<input type=\"hidden\" name=\"Location\" value=\"".$location."\"/>
			<input type=\"submit\" class=\"button\" name=\"Log Out\" id=\"Log Out\" value=\"Log Out\">
			</form>";
	else print 
		"<form method=\"post\">
		 <input type=\"submit\" name=\"Sign In\" class=\"button\" id=\"Sign In\" value=\"Sign In\" formaction=\"Enter.php\">
		 <input type=\"submit\" name=\"Sign In User\" class=\"button\" id=\"Sign In User\" value=\"Sign in User\" formaction=\"Enter.php\"/>
		 <input type=\"hidden\" name=\"Location\" value=\"".$location."\"/>
		 <input type=\"submit\" class=\"button\" id=\"Register\" value=\"Register\" formaction=\"Create.php\">
		 </form>";
	}	
	
?>
<body>
	
</body>

</html>
