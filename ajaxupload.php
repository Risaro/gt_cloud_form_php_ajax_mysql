<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','c3p','zip','rar','webm','html','mp4','flv'); // valid extensions
$path = 'uploads/'; // upload directory
if(!empty($_POST['name']) || !empty($_POST['lastname']) || $_FILES['image'])
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$a = date('Время-Y-m-d-H-i-Проект-');
$b = date('Y-m-d-H-i');

// can upload same image using rand function
$final_image = $a.$img;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' />";
$name = $_POST['name'];
$lastname = $_POST['lastname'];
//include database configuration file
include_once 'db.php';
//insert form data in the database
$insert = $db->query("INSERT uploading (name,lastname,file_name,time) VALUES ('".$name."','".$lastname."','".$path."','".$b."')");
//echo $insert?'ok':'err';
header('Location: ../index.php');
}
} 
else 
{
echo 'invalid';
}
}
?>
