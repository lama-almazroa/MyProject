
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>دليل طالبات</title>
  <link rel="stylesheet" href="stylee.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
<section class="afterhelp">
            <h1 > نتيجة البحث:</h1>
                    
                   </section>
    <section class="header">
      <nav>
      
        <a href="Interface.html"><img src="pic1/logo1.png"></a> 
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
          <li><a href="Interface.html" >الرجوع للرئيسية</a></li>
           
          </ul>

        </div>
        <i class="fa fa-bars" onclick="showMenu()" ></i>


        
     
    </section>
  <!---هنا جافا سكربت للقائمه بالايفون-->
  <script>
    var navLinks = document.getElementById("navLinks")
    function showMenu(){
        navLinks.style.left="0";
      
    }
    function hideMenu(){
       navLinks.style.left= "-200px"; 
    }

   </script>
 


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

<style>

table{
    color:#6e86b5;
  margin:80px  400px -300px;
}
 th{
  color: #4a5977;
   padding: 10px}
   td{
    padding: 1px 15px;
   }

@media (max-width:700px) {

  table{
 
    margin:30px  ;
  }
 
    th{ padding: 1px}
 
}

</style>


  

  <table >
 

  
     <br><br><br>
     <th> رقم الدرور   </th>
     <th> اسم المكتب    </th>  
    <th>  اسم الموظفة  </th>
    <th>  رقم الصيانه   </th>
    <th>  رقم المكتب  </th>  
  
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
  

 else {
  
  echo "Sorry, your search query doesn't match any data!"; 

} 


}
