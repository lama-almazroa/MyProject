<!DOCTYPE html>
<html>
<head>
 <title>Search Bar using PHP</title>
</head>
<body>

<form method="post">
<input type="submit" name="submit" value="تنفيذ">
<input type="text" name="search" placeholder="اسم او رقم الصيانه..">
 <label>بحث</label>
    
</form>

</body>
</html>

<?php

$username = "root";
$password ="";
$database = new 
PDO("mysql:host=localhost;dbname=myss; charset=utf8;", $username,$password);


if (isset($_POST["submit"])) {
 $str = $_POST["search"];
    
 $sth = $database->prepare("SELECT * FROM search WHERE CONCAT(floor,FirstLastName,OfficeName,ServiceNumber,OfficeNumber) LIKE '%$str%' ");
   
   
 $sth->setFetchMode(PDO:: FETCH_OBJ);
 $sth -> execute();

 if($row = $sth->fetch())
 {
  ?>


<br><br><br>


<style>

table{
    
  color:#6e86b5;
  margin:800px  -300px;
padding: auto;

}
@media (max-width:700px) {

  table{
   
    margin:30px  50px;
  }
     th{ padding: 10px}
    td{ padding: 15px}
}

</style>
  <table>
   <tr>
     <th>   الدرور  </th>
     <th>   اسم المكتب  </th>  
    <th>    اسم الموظفة </th>
    <th>    رقم الصيانه </th>
    <th>    رقم المكتب  </th>  
   </tr>
   <tr>
    
    <td><?php echo $row->floor; ?></td>
    <td><?php echo $row->OfficeName; ?></td>
    <td><?php echo $row->FirstLastName; ?></td>
    <td><?php echo $row->ServiceNumber; ?></td>
    <td><?php echo $row->OfficeNumber; ?></td>
   </tr>

  </table>
 <?php 
 }
  
  
  else{
   echo "Sorry, your search query doesn't match any data!";
  }


}