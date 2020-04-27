# 公告管理

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ANNOUNCEMENT_READ           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題        |   x  |
|             | is_marquee                      | string   |    |   跑馬燈 ,Y:開啟 N:關閉       |   x  |
|             | is_top                      | string   |    |   置頂 ,Y:開啟 N:關閉       |   x  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   x  |
|             | page                      | integer      |         1     |      頁碼        |   x  |
|             | perpage                      | integer      |       20       |      每頁筆數        |   x  |

> 總數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage/total      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ANNOUNCEMENT_READ           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題        |   x  |
|             | is_marquee                      | string   |    |   跑馬燈 ,Y:開啟 N:關閉       |   x  |
|             | is_top                      | string   |    |   置頂 ,Y:開啟 N:關閉       |   x  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   x  |

> 新增

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ANNOUNCEMENT_CREATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | title                      | string      |              |      標題        |   o  |
|             | is_marquee                      | string   |    |   跑馬燈 ,Y:開啟 N:關閉       |   o  |
|             | is_top                      | string   |    |   置頂 ,Y:開啟 N:關閉       |   o  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   o  |
|             | cover                      | image      |              |     封面      |   x  |
|             | contents                      | string      |              |        內文   |   o |
|             | editor_image_ids             | array      |              |   編輯器圖片id   |   x |


> 編輯資訊

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage/edit     |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_ANNOUNCEMENT_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      公告id        |   o  |


> 更新

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage/update       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ANNOUNCEMENT_UPDATE           |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      公告id        |   o  |
|             | title                      | string      |              |      標題        |   o  |
|             | is_marquee                      | string   |    |   跑馬燈 ,Y:開啟 N:關閉       |   o  |
|             | is_top                      | string   |    |   置頂 ,Y:開啟 N:關閉       |   o  |
|             | status                      | string   |    |   狀態 ,Y:開啟 N:關閉       |   o  |
|             | cover                      | image      |              |    封面       |   x  |
|             | contents                      | string      |              |        內文   |   o |
|             | editor_image_ids             | array      |              |   編輯器圖片id   |   x |
|             | remove_cover             | boolean      |              |   刪除封面(接受的參數值有:true,false,1,0,"1","0") |   x |

> 刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage      |              |              |                     |      |
| <b>方法</b>  | DELETE                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_ANNOUNCEMENT_DELETE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      公告id        |   o  |


> 編輯器圖片上傳

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage/image/upload      |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_ANNOUNCEMENT_CREATE/MANAGE_ANNOUNCEMENT_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | image                      | image      |              |              |   o  |

> 編輯器圖片刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage/image/remove      |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_ANNOUNCEMENT_CREATE/MANAGE_ANNOUNCEMENT_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | image_id                      | integer      |              |    編輯器圖片id          |   o  |



> 列表選項(跑馬燈 & 置頂 & 狀態)

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |announcement/manage/options      |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_ANNOUNCEMENT_READ/MANAGE_ANNOUNCEMENT_CREATE/MANAGE_ANNOUNCEMENT_UPDATE           |              |              |          -          |      |
