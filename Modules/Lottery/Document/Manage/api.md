# 彩種分類

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_classified/manage       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_CLASSIFIED_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | name                      | string      |              |      名稱(唯一值,長度最大30)        |   x  |
|             | enable                      | string      |              |      狀態        |   x  |
|             | page                      | integer      |         1     |      頁碼        |   x  |
|             | perpage                      | integer      |       20       |      每頁筆數        |   x  |

> 總筆數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_classified/manage/total       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_CLASSIFIED_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | name                      | string      |              |      名稱(唯一值,長度最大30)        |   x  |
|             | enable                      | string      |              |      狀態(Y:開/N:關)        |   x  |

> 詳細資訊

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_classified/manage/info       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_CLASSIFIED_READ          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |     id        |   o  |

> 新增

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_classified/manage/create       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_CLASSIFIED_CREATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | name                      | string      |              |      名稱(唯一值,長度最大30)        |   o  |
|             | enable                      | string      |         | 狀態(Y:開/N:關)      |   o  |

> 編輯

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_classified/manage/update       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_CLASSIFIED_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |
|             | name                      | string      |              |      名稱(唯一值,長度最大30)        |   o  |
|             | enable                      | string      |         | 狀態(Y:開/N:關)      |   o  |

> 刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_classified/manage/del      |              |              |                     |      |
| <b>方法</b>  | DELETE                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_CLASSIFIED_DELETE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |

> 查詢選項

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_classified/manage/options       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_CLASSIFIED_READ或MANAGE_LOTTERY_CLASSIFIED_CREATE或MANAG_LOTTERY_CLASSIFIED_UPDATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
