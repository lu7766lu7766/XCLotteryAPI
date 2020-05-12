# 開獎結果

> 列表

```
{
  "code": "0",
  "data": {
    "id": 2,
    "name": "重庆时时彩",
    "code": "ssc",
    "enable": "Y",
    "image_path": null,
    "created_at": "2020-04-17 15:23:19",
    "updated_at": "2020-04-17 15:23:19",
    "deleted_at": null,
    "draw_result": [
      {
        "id": 100862,
        "lottery_id": 2,
        "period": "20200429031",
        "draw_time": "2020-04-29 14:30:00",
        "open_time": "2020-04-29 14:10:00",
        "close_time": "2020-04-29 14:30:00",
        "winning_numbers": [
          "4",
          "1",
          "3",
          "3",
          "4"
        ],
        "enable": "Y",
        "created_at": "2020-04-29 00:00:04",
        "updated_at": "2020-04-29 14:40:09"
      }
    ],
    "classified": [
      {
        "id": 7,
        "name": "時時彩",
        "enable": "Y",
        "created_at": "2020-04-20 18:03:44",
        "updated_at": "2020-04-22 11:40:23",
        "relations": {
          "lottery_id": 2,
          "lottery_classified_id": 7,
          "created_at": "2020-04-27 11:39:17",
          "updated_at": "2020-04-27 11:39:17"
        }
      }
    ]
  }
}
```

> 彩種分類中獎列表

```
{
  "id": 1,
  "name": "烏龜彩",  //彩種分類名稱
  "enable": "Y",
  "created_at": "2020-04-08 17:38:55",
  "updated_at": "2020-04-08 17:39:41",
  "game": [
    {
      "id": 1,
      "name": "文鳥彩", //彩種名稱
      "code": "bjpk10",
      "enable": "Y",
      "image_path": "lottery/image/xpxnlfGug77EfAb2k42jEKrOHyMgt7rhDfpgX6J7.png", //彩種圖片
      "created_at": "2020-04-16 15:49:03",
      "updated_at": "2020-04-16 17:05:21",
      "deleted_at": null,
      "relations": {
        "lottery_classified_id": 1,
        "lottery_id": 1,
        "created_at": "2020-04-16 15:53:10",
        "updated_at": "2020-04-16 15:53:10"
      },
      "draw_result": []  //開獎結果
    },
    {
      "id": 2,
      "name": "重庆时时彩",
      "code": "ssc",
      "enable": "Y",
      "image_path": null,
      "created_at": "2020-04-16 15:49:03",
      "updated_at": "2020-04-16 16:20:18",
      "deleted_at": null,
      "relations": {
        "lottery_classified_id": 1,
        "lottery_id": 2,
        "created_at": "2020-04-16 15:53:10",
        "updated_at": "2020-04-16 15:53:10"
      },
      "draw_result": [
        {
          "id": 2,
          "lottery_id": 2,
          "period": "20200422002",  //期數
          "draw_time": "2020-04-22 00:50:00",  //開獎時間
          "open_time": "2020-04-22 00:30:00",  //開盤時間
          "close_time": "2020-04-22 00:50:00", //關盤時間
          "winning_numbers": [  //中獎數組
            "15",
            "18",
            "31"
          ],
          "enable": "Y",
          "created_at": "2020-04-22 10:45:52",
          "updated_at": "2020-04-22 10:45:52"
        }
      ]
    }
  ]
}
```
