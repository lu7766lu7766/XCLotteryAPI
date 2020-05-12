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

# 彩種設置

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | classified_id    | integer      |              |      分類id        |   x  |
|             | enable            | string      |              |      狀態        |   x  |
|             | name              | string      |              |      名稱(唯一值,長度最大20)        |   x  |
|             | page              | integer      |         1     |      頁碼        |   x  |
|             | perpage           | integer      |       20       |      每頁筆數        |   x  |

> 總筆數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/total       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | classified_id    | integer      |              |      分類id        |   x  |
|             | enable            | string      |              |      狀態        |   x  |
|             | name              | string      |              |      名稱(唯一值,長度最大20)        |   x  |
> 詳細資訊

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/info       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_READ          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |     id        |   o  |

> 編輯

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/update       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |
|             | classified_ids          | array      |              |  分類id(多選)  |   o  |
|             | name                   | string      |              |  名稱(唯一值,長度最大20) |   x  |
|             | image                  | file      |              |  圖片(長寬上限為100 x 100)  |   x  |
|             | enable                 | string      |         | 狀態(Y:開/N:關)      |   o  |
|             | del_image                 | string      |         | 要刪圖請傳Y      |   x  |

> 刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/del      |              |              |                     |      |
| <b>方法</b>  | DELETE                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_DELETE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |

> 查詢選項

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/options       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_READ或MANAG_LOTTERY_UPDATE        |         |            |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |

> 彩種規則編輯

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/update_rule       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_UPDATE        |         |            |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |
|             | rule        | string      |              |      遊戲規則文案       |   o  |
|             | editor_image_ids        | array      |              |      編輯器圖片id        |   x  |


> 編輯器圖片上傳

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/image/upload      |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_LOTTERY_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | image                      | image      |              |              |   o  |

> 編輯器圖片刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery/manage/image/remove      |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  |MANAGE_LOTTERY_UPDATE         |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | image_id                      | integer      |              |    編輯器圖片id          |   o  |



# 開獎結果

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_result/manage       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_RESULT_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | start    | string      |              |      開始日期(格式:YYYY-mm-dd HH:ii:ss)        |   x  |
|             | end    | string      |              |      結束日期(格式:YYYY-mm-dd HH:ii:ss)        |   x  |
|             | classified_id    | integer      |              |      分類id        |   x  |
|             | lottery_id    | integer      |              |      彩種id        |   x  |
|             | enable            | string      |              |      狀態(Y:開/N:關)        |   x  |
|             | period          | string      |              |      彩票期數       |   x  |
|             | page              | integer      |         1     |      頁碼        |   x  |
|             | perpage           | integer      |       20       |      每頁筆數        |   x  |

> 總筆數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_result/manage/total       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_RESULT_READ       |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | start    | string      |              |      開始日期(格式:YYYY-mm-dd HH:ii:ss)        |   x  |
|             | end    | string      |              |      結束日期(格式:YYYY-mm-dd HH:ii:ss)        |   x  |
|             | classified_id    | integer      |              |      分類id        |   x  |
|             | lottery_id    | integer      |              |      彩種id        |   x  |
|             | enable            | string      |              |      狀態(Y:開/N:關)        |   x  |
|             | period          | string      |              |      彩票期數       |   x  |

> 詳細資訊

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_result/manage/info       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_RESULT_READ          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |     id        |   o  |

> 編輯

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_result/manage/update       |              |              |                     |      |
| <b>方法</b>  | POST                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_RESULT_UPDATE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |
|             | winning_numbers          | array      |      |  開獎號碼  |   o  |
|             | enable                 | string      |         | 狀態(Y:開/N:關)      |   o  |

> 刪除

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_result/manage/del      |              |              |                     |      |
| <b>方法</b>  | DELETE                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_RESULT_DELETE          |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | id                      | integer      |              |      id        |   o  |

> 查詢選項

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_result/manage/options       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  | MANAGE_LOTTERY_RESULT_READ       |         |            |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
