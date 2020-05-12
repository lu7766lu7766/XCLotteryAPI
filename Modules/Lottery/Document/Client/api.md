# 開獎結果

> 列表

| 項目         | 內容                         | 類型         | 預設         | 說明                  | 必填  |
|-------------|-----------------------------|--------------|--------------|---------------------|-------|
| <b>路徑</b>  |lottery_result/client       |              |              |                     |      |
| <b>方法</b>  | GET                        |              |              |                     |      |
| <b>權限</b>  |        |              |              |          -          |      |
| <b>參數</b>  |                             |              |              |                     |      |
|             | lottery_id    | integer      |     |      彩種id        |   o  |
|             | period          | string      |              |      彩票期數       |   x  |
|             | start_period          | string      |              |      彩票期數(開始)       |   x  |
|             | end_period          | string      |              |      彩票期數(結束)       |   x  |
|             | start    | string      |              |      開始日期(格式:YYYY-mm-dd HH:ii:ss)        |   x  |
|             | end    | string      |              |      結束日期(格式:YYYY-mm-dd HH:ii:ss)        |   x  |
|             | limit           | integer      |            |      筆數(不傳會回傳全部)        |   x  |