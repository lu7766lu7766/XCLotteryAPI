# 公告管理

> 列表

```
{
     "code": "0",
        "data": [
            {
                "id": 10,
                "title": "abc123",  //標題
                "cover": null,  //封面
                "contents": "asdqwe",  //內文
                "is_marquee": "Y",  //是否開啟跑馬燈
                "is_top": "Y",  //是否置頂
                "status": "Y",  //狀態
                "created_at": "2020-03-31 17:03:33",
                "updated_at": "2020-03-31 17:03:33",
                "editor_files": [  //編輯器圖片
                    {
                        "id": 5,
                        "file_path": "AWr24HWUGzdRj2fZ7E7RP0Qm7C3pTXLiebwlVE5k.jpeg", //圖片位置
                        "created_at": "2020-03-31 16:49:25",
                        "updated_at": "2020-03-31 16:49:25",
                        "pivot": {
                            "used_id": 10,
                            "editor_file_id": 5,
                            "used_type": "announcement"
                        }
                    }
                ]
            }
        ]
}
```

> 總數

```
{
     "data": "1",
        "code": "0"
}
```

> 新增

```
{
  "code": "0",
     "data": {
         "title": "abc123",
         "contents": "asdqwe",
         "is_marquee": "Y",
         "is_top": "Y",
         "status": "Y",
         "updated_at": "2020-03-31 19:32:19",
         "created_at": "2020-03-31 19:32:19",
         "id": 12,
         "editor_files": [
             {
                 "id": 3,
                 "file_path": "L3SByAATA4HPuiCBhcx1cw0j8T5JZhlIyezTCb2Y.jpeg",
                 "created_at": "2020-03-31 16:49:23",
                 "updated_at": "2020-03-31 16:49:23",
                 "pivot": {
                     "used_id": 12,
                     "editor_file_id": 3,
                     "used_type": "announcement"
                 }
             },
             {
                 "id": 5,
                 "file_path": "AWr24HWUGzdRj2fZ7E7RP0Qm7C3pTXLiebwlVE5k.jpeg",
                 "created_at": "2020-03-31 16:49:25",
                 "updated_at": "2020-03-31 16:49:25",
                 "pivot": {
                     "used_id": 12,
                     "editor_file_id": 5,
                     "used_type": "announcement"
                 }
             }
         ]
     }
}
```

> 編輯資訊

```
{
     "code": "0",
        "data": {
            "id": 9,
            "title": "abc123",
            "cover": null,
            "contents": "asdqwe",
            "is_marquee": "Y",
            "is_top": "Y",
            "status": "Y",
            "created_at": "2020-03-31 17:00:44",
            "updated_at": "2020-03-31 17:00:44",
            "editor_files": [
                {
                    "id": 3,
                    "file_path": "L3SByAATA4HPuiCBhcx1cw0j8T5JZhlIyezTCb2Y.jpeg",
                    "created_at": "2020-03-31 16:49:23",
                    "updated_at": "2020-03-31 16:49:23",
                    "pivot": {
                        "used_id": 9,
                        "editor_file_id": 3,
                        "used_type": "announcement"
                    }
                },
                {
                    "id": 5,
                    "file_path": "AWr24HWUGzdRj2fZ7E7RP0Qm7C3pTXLiebwlVE5k.jpeg",
                    "created_at": "2020-03-31 16:49:25",
                    "updated_at": "2020-03-31 16:49:25",
                    "pivot": {
                        "used_id": 9,
                        "editor_file_id": 5,
                        "used_type": "announcement"
                    }
                }
            ]
        }
}
```

> 更新

```
{
  "code": "0",
     "data": {
         "title": "abc123",
         "contents": "asdqwe",
         "is_marquee": "Y",
         "is_top": "Y",
         "status": "Y",
         "updated_at": "2020-03-31 19:32:19",
         "created_at": "2020-03-31 19:32:19",
         "id": 12,
         "editor_files": [
             {
                 "id": 3,
                 "file_path": "L3SByAATA4HPuiCBhcx1cw0j8T5JZhlIyezTCb2Y.jpeg",
                 "created_at": "2020-03-31 16:49:23",
                 "updated_at": "2020-03-31 16:49:23",
                 "pivot": {
                     "used_id": 12,
                     "editor_file_id": 3,
                     "used_type": "announcement"
                 }
             },
             {
                 "id": 5,
                 "file_path": "AWr24HWUGzdRj2fZ7E7RP0Qm7C3pTXLiebwlVE5k.jpeg",
                 "created_at": "2020-03-31 16:49:25",
                 "updated_at": "2020-03-31 16:49:25",
                 "pivot": {
                     "used_id": 12,
                     "editor_file_id": 5,
                     "used_type": "announcement"
                 }
             }
         ]
     }
}
```

> 刪除

```
{
 "code": "0",
     "data": {
         "id": 8,
         "title": "abc123",
         "cover": null,
         "contents": "asdqwe",
         "is_marquee": "Y",
         "is_top": "Y",
         "status": "Y",
         "created_at": "2020-03-31 16:59:29",
         "updated_at": "2020-03-31 16:59:29"
     }
}
```

> 編輯器圖片上傳

```
{
  "code": "0",
    "data": {
        "file_path": "wiXZKlg548T1PewdAKkEebDjuR0KwRUKElS1TNaE.jpeg",
        "updated_at": "2020-03-31 19:34:48",
        "created_at": "2020-03-31 19:34:48",
        "id": 6
    }
}
```

> 編輯器圖片刪除

```
{
  "data": "1",
     "code": "0"
}
```


> 列表選項(跑馬燈 & 置頂 & 狀態)

```
{
  "code": "0",
     "data": [
         "Y",
         "N"
     ]
}
```
