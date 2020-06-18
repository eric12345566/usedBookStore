<?php 
   require __DIR__ . '/../vendor/autoload.php';
   $db = Database::get();
   $result = $db->execute("UPDATE generaluser SET name=?,phonenumber=?,gender=?,bdate=?,email=?   
                           WHERE username = $username ;", array($name,$phonenumber,$gender,$bdate,$email));                        
?>