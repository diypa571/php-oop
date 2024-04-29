<?php
Class Contact
{
  private $host ='127.0.0.1';  // Referens till host
  private $username  ='databasUsername'; // Referens till användarnamn
  private $password ='databasPassword'; // Referens till password
  private $dbName ='databasName'; // Referens namn på databasen
  private $conn;


// En default konstuktor
function __Construct()
{
    $this->conn = new mysqli($this->host,$this->username,$this->password,$this->dbName);
    if(mysqli_connect_error())
    {
       trigger_error('Något blev fel'.mysqli_connect_error());
    }
    else
    {
       return $this->conn;
    }
}


//    
 function Add() {
$rand1 = $_POST['rand1'];
$rand2 = $_POST['rand2'];
if(!isset($rand1) || $rand2 != $rand1) {
header("Location:contact.php?contact=error1");
exit();
}
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$country = $_POST['country'];
$date =  $_POST['date'];
$result = $this->conn->prepare("INSERT INTO tbcontact(name ,email, message, subject, telephone ,address, zip ,city ,country,date) VALUES(?,?,?,?,?,?,?,?,?,?)");
$result->bind_param("ssssssssss", $name ,$email, $message, $subject, $telephone ,$address, $zip ,$city ,$country, $date);
$result->execute();
if($result == true)
{
header("Location:contact.php?contact=success");
}
else
{
header("Location:contact.php?contact=error");
}
$result->close();
$this->conn->close();
}


}


?>
