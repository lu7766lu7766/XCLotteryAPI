# 新聞分類

> 所有分類

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |news_classified/client/all       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |  |  |        |  -    |      |
| <b>參數</b>  |                             |              |              |                     |      |

# 新聞資訊

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |news/client       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |  |  |        |  -    |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             |classified_id                   | int         |               | 分類id |   o  |
|             | page                        | int      |         1     |      頁碼        |   x  |
|             | perpage                     | int      |       20       |      每頁筆數        |   x  |

> 總筆數

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |news/client/total         |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |  |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             |classified_id                   | int         |               | 分類id |   o  |

> 新聞內文

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |news/client/full_text         |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |                     |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             |id                        | int      |               | 新聞id  |   O  |

> 最新新聞

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |news/client/latest         |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |                     |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             |limit                        | int      |        5       | 資料筆數  |   O  |
