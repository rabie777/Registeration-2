<?php

$errors=array();
$data=array();
function printdata($data)
{
echo "<pre>";
print_r($data);
echo "</pre>";
}

function decomposed($data)
{
    
    foreach ($data as $key => $value) 
	 {
	 	global $$key;
	 	 $$key=$value;

	 }

}

function clean($data)
{
if(is_array($data))
{
	foreach ($data as $key => $value) 
		 $data[$key]=htmlspecialchars(trim($value));
}
else{
         $data=htmlspecialchars(trim($value));
}
return $data;
}

 function upload()
 {
	  $name=uniqid(). $_FILES['image']['name'];
	  $image_location=__DIR__.DIRECTORY_SEPARATOR."uploaded";
	  $source=$_FILES['image']['tmp_name'];
	  move_uploaded_file($source,$name);
	  return  $name;

 }


function setItemErrors($Item,$message)
{
global $errors;
$errors[$Item]=$message;

}

function savesession($user,$value)
{
global $data;
$data[$user]=$value;

}


?>