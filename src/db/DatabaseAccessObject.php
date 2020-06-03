<?php
  class DatabaseAccessObject {
    private $mysql_address = "";
    private $mysql_username = "";
    private $mysql_password = "";
    private $mysql_database = "";
    private $db;
    private $last_id = 0;
    private $last_rows_counts = 0;
    private $error_message = "";

    /**
     * 當被new時，建立資料庫連線
     */
    public function __construct($mysql_address, $mysql_username, $mysql_password, $mysql_database) {
      $this->mysql_address  = $mysql_address;
      $this->mysql_username = $mysql_username;
      $this->mysql_password = $mysql_password;
      $this->mysql_database = $mysql_database;

      try {
          $db = new PDO("mysql:host=".$this->mysql_address.";charset=utf8mb4;dbname=".$this->mysql_database, $this->mysql_username, $this->mysql_password);
          //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
          $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // 取消模擬 prepare，加速資料庫 query 速度

          $this->db = $db;
      } catch(PDOException $e) {
          //show error
          echo '<p class="bg-danger">'.$e->getMessage().'</p>';
          exit;
      }
    }


    /**
     * 當物件被unset，自動切斷與資料庫連結。
     */
    public function __destruct() {
        $this->db = null;
    }

    /**
     * 回傳整個 db 物件
     */
    public function getDB(){
      return $this->db;
    }

    /**
     * 直接執行 SQL，並且return fetchAll()的結果。
     * 使用方式：
     * 1. SQL內使用 :name 當作變數，data_array就必須是('name'=>value)
     * 2. 使用 ? 當作變數，data_array可以為單純陣列
     * 不可合併使用兩種方式。
     *
     * 參考：https://www.runoob.com/php/pdo-prepare.html
     */
    public function execute($sql = null, $data_array = array()) {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($data_array);

            $this->last_id = $this->db->lastInsertId();
            $this->last_rows_counts = $stmt->rowCount();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            $this->error_message = '<p class="bg-danger">'.$e->getMessage().'</p>';
        }
    }

    /**
     * 回傳錯誤訊息
     */
    public function getErrorMessage(){
      return $this->error_message;
    }

    /**
     * 回傳最後一個 insert 的 ID
     */
    public function getLastId() {
      return $this->last_id;
    }

    /**
     * 回傳受到影響的行數 （UPDATE, DELETE, SELECT)
     */
    public function getRowCount() {
      return $this->last_rows_counts;
    }
  }

?>
