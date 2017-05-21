<?php
/*
 * DB.php
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
	function Execute($statement,$values,$dbName="forum")
{
	$servername = "localhost";
	$username = "martin";
	$password = "workpass";
	try {
    $conn = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    $sth=$conn->prepare($statement,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($values);
    $conn = null;
    return $sth;
	}

function Update($type,$object,$ID)
{
	Execute("Update ".$type."Set :values Where ID = :ID ",array(":values"=>$values));
}
function FetchAll($statement,$values=array())
{
	    return Execute($statement,$values)->fetchAll();
}	
function Find($ID, $type)
{
	return FetchAll("Select * from ". $type ." WHERE ID=:id",array(":id"=>$ID));
}
function FindAll($type)
{
	return FetchAll("Select * FROM ". $type);
}
function FindAllFiltered($type,$filter,$values=array())
{
	return FetchAll("Select * FROM ". $type ." WHERE ".$filter,	$values);
}
function Delete($ID,$type)
{
	Execute("DELETE FROM ".$type." WHERE ID =:id ",array(":id"=>$ID));
}
	
$getKey=function($key,$value){ return $key;};
$getValue=function($key,$value){ return $value;}; 	
function PrintRow($data,$function,$specialCheck,$extraHeaders=array())
	{
			print "<tr>";
			foreach($data as $key=>$value)
			if(!is_numeric($key) && strpos($key,"ID")===false && $specialCheck($key,$value) )
			print "<th>".$function($key,$value)."</th>";
			foreach($extraHeaders as $header)
			print "<th>".$header."</th>";
			print"</tr>";
		}
	
	?>
</body>

</html>
