# 友情鏈結

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |cooperation/manage       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COOPERATION_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題(最多30字)        |   x  |
|             | enable                      | string      |              |      狀態        |   x  |
|             | page                      | integer      |         1     |      頁碼        |   x  |
|             | perpage                      | integer      |       20       |      每頁筆數        |   x  |

> 總筆數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |cooperation/manage/total       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COOPERATION_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題(最多30字)        |   x  |
|             | enable                      | string      |              |      狀態(Y:開/N:關)        |   x  |

> 詳細資訊

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |cooperation/manage/info       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COOPERATION_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |     id        |   o  |

> 新增

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |cooperation/manage/create       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COOPERATION_CREATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |     標題        |   o  |
|             | image        | file      |              |      圖片(長寬上限為263 x 300)        |   x  |
|             | is_blank                      | string      |     否         |      是否另開新視窗(Y:是/N:否)        |   o  |
|             | link                      | string      |      N        |      鏈結       |   x  |
|             | enable                      | string      |         | 狀態(Y:開/N:關)      |   o  |
|             | del_image                      | string       |              |   要刪圖請傳Y    |   x  |

> 編輯

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |cooperation/manage/update       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COOPERATION_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |
|             | title                      | string      |              |     標題        |   o  |
|             | image        | file      |              |      圖片(長寬上限為263 x 300)        |   x  |
|             | is_blank                      | string      |     否         |      是否另開新視窗(Y:是/N:否)        |   o  |
|             | link                      | string      |      N        |      鏈結       |   x  |
|             | enable                      | string      |         | 狀態(Y:開/N:關)      |   o  |
|             | del_image                      | string       |              |   要刪圖請傳Y    |   x  |

> 刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |cooperation/manage/del      |              |              |                     |      |
| <b>方法</b>  | DELETE                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COOPERATION_DELETE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |

> 查詢選項

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |cooperation/manage/options       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COOPERATION_READ或MANAGE_COOPERATION_CREATE或MANAGE_COOPERATION_UPDATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
