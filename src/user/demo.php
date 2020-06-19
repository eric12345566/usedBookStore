<?php
  require 'vendor/autoload.php';

  $db = Database::get();
  $getId = $_GET['orderid'];
  $result = $db->execute("SELECT * FROM p_order WHERE order_no = ?", array($getId));
  if ($db->getRowCount() > 0) {
      $item = $db->execute("SELECT * FROM items WHERE order_no = ?", array($getId));
      for ($i=0; $i<$db->getRowCount(); $i++) {
          $book = $db->execute("SELECT * FROM book_product WHERE product_no = ?", array($item[$i]['product_no']));
          echo "<td>
            {$book[0]['book_name']}
            </td>
            <td>
              {$item[$i]['price']}
            </td>
            <td>
              {$item[$i]['amount']}
            </td>
        ";
      }

      $puser = $db->execute("SELECT * FROM GeneralUser WHERE username = ?", array($result[0]['p_username']));
      $suser = $db->execute("SELECT * FROM GeneralUser WHERE username = ?", array($result[0]['s_username']));
  } else {
      echo "error";
  }
?>

<?php
// DB table to use
$table = 'Admin';

// Table's primary key
$primaryKey = 'Admin_name';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'Admin_name', 'dt' => 0 ),
    array( 'db' => 'Email',  'dt' => 1 ),
);

// SQL server connection information
$sql_details = array(
    'user' => MySQL::USERNAME,
    'pass' => MySQL::PASSWORD,
    'db'   => MySQL::DATABASE,
    'host' => MySQL::ADDRESS
);



 ?>
