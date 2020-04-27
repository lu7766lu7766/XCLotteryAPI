# 頁面管理

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_READ           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題        |   x  |
|             | enable                      | string      |              |      狀態(Y:開/N:關)        |   x  |
|             | page                      | integer      |         1     |      頁碼        |   x  |
|             | perpage                      | integer      |       20       |      每頁筆數        |   x  |

> 總筆數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/total       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_READ          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題        |   x  |
|             | enable                      | string      |              |      狀態(Y:開/N:關)        |   x  |

> 詳細資訊

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/info       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_UPDATE  |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |


> 新增

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/create       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_CREATE   |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題(最長100字)        |   o  |
|             | code                      | string      |              |      代碼(最長20,會自動轉換為大寫)        |   o  |
|             | content        | string      |              |      內容        |   x  |
|             | enable                      | string      |              |      狀態(Y:開/N:關)        |  o  |
|             | editor_image_ids    | array      |              |      編輯器上傳圖片id        |   x |

> 更新

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/update       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_UPDATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |
|             | title                      | string      |              |      標題(最長100字)        |   o  |
|             | code                      | string      |              |      代碼(最長20,會自動轉換為大寫)        |   o  |
|             | content        | string      |              |      內容        |   x  |
|             | enable                      | string      |              |      狀態(Y:開/N:關)        |   o  |
|             | editor_image_ids    | array      |              |      編輯器上傳圖片id        |   x |

> 刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/del      |              |              |                     |      |
| <b>方法</b>  | DELETE                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_DELETE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |

> 選單列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/options      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_READ或MANAGE_COPYWRITING_CREATE或MANAGE_COPYWRITING_UPDATE  |  |  |    -     |      |
| <b>參數</b>  |                             |              |              |                     |      |

> 編輯器圖片上傳

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/image/upload      |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_CREATE或MANAGE_COPYWRITING_UPDATE   |  |    |      -       |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | image                      | file      |              |      圖片檔案        |   o  |

> 編輯器圖片刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |copywriting/manage/image/remove      |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_COPYWRITING_DELTE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | image_id  | integer      |              |      圖片id        |   o  |
