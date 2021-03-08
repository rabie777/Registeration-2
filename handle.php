<?php  
session_start();

include_once 'functions.php';
include_once 'crud.php';




if (isset($_POST['click'])) {
    
       decomposed($_POST);

       if (empty($firstname)) {
       	setItemErrors('firstname','firstname is require');
       }
       elseif (strlen($firstname)<5) {
       	 setItemErrors('firstname','firstname must be longer than 9 chars');
       }
       elseif (strlen($firstname)>30) {
       	setItemErrors('firstname','firstname must be less than 30chars');
       }
       else
       {
       	savesession('firstname',$firstname);
       }


      if (empty($lastname)) {
       	setItemErrors('lastname','lastname is require');
       }
       elseif (strlen($lastname)<5) {
       	 setItemErrors('lastname','lastname must be longer than 9 chars');
       }
       elseif (strlen($lastname)>30) {
       	setItemErrors('lastname','lastname must be less than 30chars');
       }
       else
       {
       	savesession('lastname',$lastname);
       }

       if (empty($email)) {
       	setItemErrors('email','email is require');
       }
       elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
       	 setItemErrors('email','email must be vaild email');
      }
      else
       {
       	savesession('email',$email);
       }
       if (empty($_FILES['image'])) {
       		setItemErrors('image','image is require');
       }
       
       if (empty($password)) {
       	setItemErrors('password','password is require');
       }
       elseif (strlen($password)<9) {
       	 setItemErrors('password','password must be longer than 9 chars');
       }
       elseif (strlen($password)>30) {
       	setItemErrors('password','password must be less than 30chars');
       }
       else
       {
            $password=password_hash($password, PASSWORD_DEFAULT);
       	savesession('password',$password);
       }



if (empty($errors))
 {
 /*	$source=upload();
    $_SESSION['image']=$source;
 	$_SESSION['data']=$data;
 header('location: register.php');*/
   insertDB($firstname,$lastname,$email,$password);
   $_SESSION['success']='Data Inserted';
   header('location:index.php');
 }
else
{
	$_SESSION['errors']=$errors;

	
	header('location: index.php');
	




}



}
////////////////////////////////


if (isset($_POST['login'])) {

//$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
 check($_POST['email'],$_POST['password']);


}


function check($email,$password)
{
      global $pdo;
$SQL="SELECT * FROM users where email=?";
$stmt=$pdo->prepare($SQL);
$stmt->execute([$email]);
$data=$stmt->fetchobject();
if($data){
      
      $check=password_verify($password,$data->password);
 
 if ($check)
  {
        $_SESSION['data']['id']=$data->id;
        $_SESSION['data']['firstname']=$data->firstname;
        $_SESSION['data']['lastname']=$data->lastname;
        $_SESSION['data']['email']=$data->email;
        header('location:home.php');  
  }
  else
  {
       echo "stringggg";

      $_SESSION['error']="Password is not correct";

  }

}
else
{
$_SESSION['error']="data is not correct";
}

/*$pdo->exec($SQL);
 $result = $pdo->setFetchMode(PDO::FETCH_ASSOC);
 foreach ($result as $value) {
 $data[]=$value;
}*/
//return $data;
}



echo "<pre>";
print_r($_SESSION);
echo"</pre>";











?>