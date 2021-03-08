
<?php
session_start();
 printdata($_FILES);
$sourc=upload();
$_SESSION['so']=$sourc;
 function upload()
 {
	 $name=uniqid(). $_FILES['image']['name'];
	  $image_location=__DIR__.DIRECTORY_SEPARATOR."uploads";
	    $source=$_FILES['image']['tmp_name'];
	 move_uploaded_file(  $source, $name);
	  return  $name;
 }

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
 echo "string".$_FILES['image']['tmp_name'];
?>

<?php if(!empty($_SESSION['so'])):?>
<img src="<?=$_SESSION['so'] ?>" width="500" height="500">
<?php endif;?>
