# 廣告輪播

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |advertisement/manage      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ADVERTISEMENT_READ           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | type_id                      | int      |              |      類型id        |   x  |
|             | title                      | string      |              |      標題        |   x  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   x  |
|             | page                      | integer      |         1     |      頁碼        |   x  |
|             | perpage                      | integer      |       20       |      每頁筆數        |   x  |

> 總數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |advertisement/manage/total      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ADVERTISEMENT_READ           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | type_id                      | int      |              |      類型id        |   x  |
|             | title                      | string      |              |      標題        |   x  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   x  |

> 新增

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |advertisement/manage       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ADVERTISEMENT_CREATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | type_id                      | int      |              |      類型id        |   o  |
|             | title                      | string      |              |    標題(max:50)        |   o  |
|             | image        | file      |              |      圖片        |   o  |
|             | is_blank                      | string      |   是否開新分頁           |     狀態 ,Y:開啟 N:關閉        |   o  |
|             | url                      | string       |              |   連結                |   x  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   O  |


> 編輯資訊

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |advertisement/manage/edit     |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_ADVERTISEMENT_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      廣告id        |   o  |


> 更新

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |advertisement/manage/update       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ADVERTISEMENT_UPDATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | type_id                      | int      |              |      類型id        |   o  |
|             | id                      | int      |              |      廣告id        |   o  |
|             | title                      | string      |              |    標題(max:50)        |   o  |
|             | image        | file      |              |      圖片        |   o  |
|             | is_blank                      | string      |   是否開新分頁           |     狀態 ,Y:開啟 N:關閉        |   o  |
|             | url                      | string       |              |   連結                |   x  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   O  |

> 刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |advertisement/manage      |              |              |                     |      |
| <b>方法</b>  | DELETE                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_ADVERTISEMENT_DELETE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      廣告id        |   o  |



> 取得類型

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |advertisement/manage/type      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_ADVERTISEMENT_READ|MANAGE_ADVERTISEMENT_CREATE|MANAGE_ADVERTISEMENT_UPDATE           |              |              |          -          |      |
