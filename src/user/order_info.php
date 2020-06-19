<?php
  require __DIR__ . '/../vendor/autoload.php';
  // 建立 Session
  session_start();
  $db = Database::get();

?>

<!DOCTYPE html>
<html>

<head>
  <title>二手書網</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="./css/card.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<body>

<h1>訂單資訊</h1>

<table width="600" border=1>
　<tr>
　<td>訂單編號</td>
　<td>總價</td>
  <td>訂單交易狀況</td>
　<td>訂單操作</td>
　</tr>
  
  <?php $price = 0;
  $sname = $db->execute("SELECT * FROM p_order WHERE s_username = ?;", array($_SESSION['username']));
  for($i = 0 ; $i < $db->getRowCount() ; $i++) {
    $result = $db->execute("SELECT * FROM items WHERE order_no = ?;", array($sname[$i]['order_no']));
    for($j = 0 ; $j < $db->getRowCount() ; $j++) { 
        $price += $result[$j]['price'] * $result[$j]['amount'];
    } 
  echo '<tr>';    
  echo '<td>'.$sname[$i]['order_no'].'</td>';
  echo '<td>'.$price.'</td>';
  echo '<td>'.$sname[$i]['order_status'].'</td>';
  echo '<td>'."查看詳細".'</td>';
  echo '</tr>';
  $price = 0;
  }
  ?>

</table>


</body>

</html>