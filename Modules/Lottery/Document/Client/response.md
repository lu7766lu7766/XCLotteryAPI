# 彩種分類

> 列表(全部)

```
{
  "code": "0",
  "data": [
    {
      "id": 1,
      "name": "烏龜彩", //分類名稱
      "enable": "Y",
      "created_at": "2020-04-08 17:38:55",
      "updated_at": "2020-04-08 17:39:41",
      "game": [  //該分類下的彩票遊戲
        {
          "id": 1,
          "name": "烏拉彩", //彩票名稱
          "code": "bjpk10",
          "enable": "Y",
          "image_path": "lottery/image/xpxnlfGug77EfAb2k42jEKrOHyMgt7rhDfpgX6J7.png",
          "created_at": "2020-04-16 15:49:03",
          "updated_at": "2020-04-16 17:05:21",
          "deleted_at": null,
          "relations": {
            "lottery_classified_id": 1,
            "lottery_id": 1,
            "created_at": "2020-04-16 15:53:10",
            "updated_at": "2020-04-16 15:53:10"
          }
        }
      ]
    },
    {
      "id": 2,
      "name": "威利彩",
      "enable": "Y",
      "created_at": "2020-04-08 17:39:06",
      "updated_at": "2020-04-08 17:39:06",
      "game": [
        {
          "id": 59,
          "name": "福彩3D",
          "code": "fsd",
          "enable": "Y",
          "image_path": null,
          "created_at": "2020-04-16 15:49:03",
          "updated_at": "2020-04-16 15:49:03",
          "deleted_at": null,
          "relations": {
            "lottery_classified_id": 2,
            "lottery_id": 59,
            "created_at": "2020-04-17 15:50:53",
            "updated_at": "2020-04-17 15:50:53"
          }
        }
      ]
    },
    {
      "id": 3,
      "name": "肥宅彩",
      "enable": "Y",
      "created_at": "2020-04-08 17:39:15",
      "updated_at": "2020-04-08 17:39:15",
      "relations": []
    }
  ]
}
```

> 單一分類成員列表

```
{
  "code": "0",
  "data": {
    "id": 2,
    "name": "PK拾",
    "enable": "Y",
    "sequence": 0,
    "created_at": "2020-04-17 15:41:35",
    "updated_at": "2020-04-23 17:08:24",
    "game": [
      {
        "id": 55,
        "name": "云南快乐十分",
        "code": "ynkl10",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 55,
          "created_at": "2020-04-21 17:03:19",
          "updated_at": "2020-04-21 17:03:19"
        }
      },
      {
        "id": 54,
        "name": "山西快乐十分",
        "code": "sxkl10",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 54,
          "created_at": "2020-04-21 17:03:27",
          "updated_at": "2020-04-21 17:03:27"
        }
      },
      {
        "id": 53,
        "name": "广西快乐十分",
        "code": "gxkl10",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 53,
          "created_at": "2020-04-21 17:03:31",
          "updated_at": "2020-04-21 17:03:31"
        }
      },
      {
        "id": 52,
        "name": "重庆快乐十分",
        "code": "cqkl10",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 52,
          "created_at": "2020-04-21 17:03:36",
          "updated_at": "2020-04-21 17:03:36"
        }
      },
      {
        "id": 51,
        "name": "湖南快乐十分",
        "code": "hnkl10",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 51,
          "created_at": "2020-04-21 17:03:41",
          "updated_at": "2020-04-21 17:03:41"
        }
      },
      {
        "id": 49,
        "name": "天津快乐十分",
        "code": "tjkl10",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 49,
          "created_at": "2020-04-21 17:37:15",
          "updated_at": "2020-04-21 17:37:15"
        }
      },
      {
        "id": 46,
        "name": "青海快3",
        "code": "qhk3",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 46,
          "created_at": "2020-04-21 17:37:37",
          "updated_at": "2020-04-21 17:37:37"
        }
      },
      {
        "id": 45,
        "name": "内蒙古快3",
        "code": "nmgk3",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 45,
          "created_at": "2020-04-21 17:37:43",
          "updated_at": "2020-04-21 17:37:43"
        }
      },
      {
        "id": 40,
        "name": "江西快3",
        "code": "jxk3",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 40,
          "created_at": "2020-04-21 17:38:10",
          "updated_at": "2020-04-21 17:38:10"
        }
      },
      {
        "id": 38,
        "name": "上海快3",
        "code": "shk3",
        "enable": "Y",
        "rule": "",
        "image_path": null,
        "created_at": "2020-04-17 15:23:19",
        "updated_at": "2020-04-17 15:23:19",
        "deleted_at": null,
        "relations": {
          "lottery_classified_id": 2,
          "lottery_id": 38,
          "created_at": "2020-04-27 11:37:02",
          "updated_at": "2020-04-27 11:37:02"
        }
      }
    ]
  }
}
```

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
