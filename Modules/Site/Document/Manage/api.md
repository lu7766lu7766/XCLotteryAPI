# 網站管理

> 基本設定-取得設定

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |site/manage      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |  MANAGE_SITE_READ     |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |


> 基本設定-更新設定

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |site/manage/update      |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  |  MANAGE_SITE_UPDATE     |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      網站名稱(長度最大50)        |   o  |
|             | logo                      | file      |              |      網站logo,無修改時請傳null        |   x  |
|             | del_logo   | string      |      |      刪除logo圖片        |   x  |
|             | copyright                | string      |              |      版權所有(長度最大50)        |   x  |
|             | icp                      | string      |              |      ICP備案號(長度最大30)        |   x  |
|             | contact                 | array      |              |      聯絡資訊(customer_service:線上客服 / qq:QQ / we_chat:微信 / telegram:telegram / potato:馬鈴薯)        |   x  |
|             | ios_qr_code             | file      |              |      ios qr code,無修改時請傳null        |   x  |
|             | del_ios_qr_code | string      |     |  刪除圖片,請傳Y       |   x  |
|             | android_qr_code         | file      |          |     android qr code,無修改時請傳null        |   x  |
|             | del_android_qr_code         | file |   |  刪除圖片,請傳Y    |   x  |
