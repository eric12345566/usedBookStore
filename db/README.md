# 二手書拍賣網
此為大學「資料庫系統」的專題程式，採用 PHP + MYSQL 開發。

## 安裝
安裝XAMPP，從此 repo 上 clone 下來，將 src 資料夾的內容全數複製到「htdoc」裡面，開啟xampp就可以執行了


## 架構

- db: 建立資料庫 Table 與假資料的 Sql 檔案
- src: 主程式資料夾
- doc: 其他設計文件、企劃書、心智圖

src的架構：
- index.php
- search.php
- tagguide.php
- [db]
    - mysql.php -> 連結後端資料庫的程式
- [user] -> 使用者登入/註冊/忘記密碼
    - index.php
    - login.php
    - register.php
    - resetpwd.php
- [bdashbord] -> 買家中心
    - index.php
    - userinfo.php
    - account.php
    - order.php
- sdashbord -> 賣家中心

(未完待續)
