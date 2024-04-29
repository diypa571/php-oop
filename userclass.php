<?php
/*
Följande php kod är att skriven med php OOP
OBS, tänk på, ha ej publika funktioner
Diyar Parwana
diypa571@gmail.com
*/


Class User
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





// En funktion för att hämta data från tabellen
// Jag tycker inte om pekare * i funktionen, det är säkerhets bris... 
// Modifiera till namn, id,about.... FROM tbusers
function displayData() {
      $query = "SELECT * FROM tbusers";
      $result = $this->conn->query($query);
      if ($result->num_rows > 0)
       {
     $data = array();
          while ($row = $result->fetch_assoc())
          {
         $data[] = $row;
      }
 return $data;
      }
      else
     {
  echo " Ingen data finns tillgänlig";
 }
  }
 

function displyaRecordById($id)
{
  $query = "SELECT * FROM tbusers WHERE id = '$id'";
  $result = $this->conn->query($query);
	if ($result->num_rows > 0)
{
  $row = $result->fetch_assoc();
  return $row;
  }
else
{
   echo " Ingen data finns tillgänlig ";
  }
}



}


?>
