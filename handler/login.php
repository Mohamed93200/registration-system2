<?php 
session_start();
require '../inc/db.php';
if(isset($_POST['submit']))
{

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password =filter_var($_POST['password'], FILTER_SANITIZE_STRING);


//check if this email exists or not
$sql = "SELECT * FROM users WHERE email=? ";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$data = $stmt->fetchObject();    

if($data)
{
    $check = password_verify($password,$data->password);//بتقارت الباسورد اللى انا لسه كاتبه ناو بالهاش بتاع الباسورداللى موجود فى الداتا بيز
    if($check)
    {
        $_SESSION['user_id'] = $data->id;
        $_SESSION['user_name'] = $data->name;
        $_SESSION['user_email'] = $data->email;
        $_SESSION['user_mobile'] = $data->mobile;

         header("location:../index.php");
        die();
    }
    else
    {
        $_SESSION['error'] = "email or password not correct";

    }
}
else
{
    $_SESSION['error'] = "data not correcct";

}

}
    header("location:../login.php");

