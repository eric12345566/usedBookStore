# 二手書媒合系統 SRC
就這樣，詳細在第一頁。

## Clone 建議
建議可以直接Clone在Xampp的htdocs裡頭

## Install&Run
1. Clone後，請先安裝套件

        composer install

2. 更新autoload

        composer dump

## 如何新增 Class 到 Autoload 裡頭
基本上，所有需要被載入的 Class，請放在lib裡面。如果需要另外存放在新的資料夾，可以依照下面的指示

1. 修改composer.json，把資料夾路徑放在 autoload 裡的 classmap 底下。

        {
            "name": "eric/src",
            "authors": [
                {
                    "name": "Eric Shih",
                    "email": "eric12345566@gmail.com"
                }
            ],
            "require": {},
            "autoload": {
                "classmap":[
                    "db",
                    "config",
                    "lib",
                    "", <-- 請放在這 
                ]
            }
        }


2. 修改完記得執行：

        composer dump


## PDO Note


