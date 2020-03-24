# 登入者

> 個人檔案

```
{
    "code": "0",
    "data": {
        "id": 2,
        "account": "house",
        "display_name": "house系统管理员",
        "status": "enable",
        "mail": "house@house.cc",
        "phone": "3939889",
        "login_ip": "172.23.0.1",
        "created_at": "2019-06-26 18:33:49",
        "updated_at": "2019-06-26 18:34:46",
        "deleted_at": null,
        "cover": { // 圖像
            "id": 1,
            "account_id": 12,
            "path": "http://sms-api.house.cc/storage/account_cover/A48TxEs05ke32FZ8NZNnlAtbXtqtoRiHnF81QDPQ.jpeg",
            "created_at": "2019-07-10 20:59:34",
            "updated_at": "2019-07-10 20:59:34"
        },
        "roles": [
            {
                "id": 1,
                "display_name": "超級管理員",
                "code": "ADMIN",
                "enable": "Y",
                "public": "N",
                "created_at": "2019-07-25 14:14:08",
                "updated_at": "2019-07-25 14:14:08",
                "pivot": {
                    "account_id": 1,
                    "role_id": 1,
                    "created_at": "2019-07-25 14:14:08",
                    "updated_at": "2019-07-25 14:14:08"
                }
            }
        ]

    }
}
```

> 編輯

```
{
    "code": "0",
    "data": {
        "id": 2,
        "account": "house",
        "display_name": "豪斯bombom管理員",
        "status": "enable",
        "mail": "house@house.cc",
        "phone": "3939889",
        "login_ip": "172.23.0.1",
        "created_at": "2019-06-26 18:33:49",
        "updated_at": "2019-06-27 18:06:15",
        "deleted_at": null,
        "cover": { // 圖像
            "id": 1,
            "account_id": 12,
            "path": "http://sms-api.house.cc/storage/account_cover/A48TxEs05ke32FZ8NZNnlAtbXtqtoRiHnF81QDPQ.jpeg",
            "created_at": "2019-07-10 20:59:34",
            "updated_at": "2019-07-10 20:59:34"
        }
    }
}
```

> 節點地圖

```
{
  "code": "0",
  "data": [
    {
      "id": 1,
      "display_name": "角色設定",
      "code": "ROLE_CUSTOM_MANAGE",
      "enable": "Y",
      "display": "Y",
      "public": "Y",
      "created_at": "2019-12-27 11:13:18",
      "updated_at": "2019-12-27 11:13:18",
      "nodes": [
        {
          "id": 1,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "角色設定-讀取",
          "code": "ROLE_CUSTOM_MANAGE_READ",
          "path": "role.custom.manage.read",
          "node_group_id": 1,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        },
        {
          "id": 2,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "角色設定-新增",
          "code": "ROLE_CUSTOM_MANAGE_CREATE",
          "path": "role.custom.manage.create",
          "node_group_id": 1,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        },
        {
          "id": 3,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "角色設定-編輯",
          "code": "ROLE_CUSTOM_MANAGE_UPDATE",
          "path": "role.custom.manage.update",
          "node_group_id": 1,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        },
        {
          "id": 4,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "角色設定-刪除",
          "code": "ROLE_CUSTOM_MANAGE_DEL",
          "path": "role.custom.manage.del",
          "node_group_id": 1,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        },
        {
          "id": 5,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "角色設定-權限",
          "code": "PUBLIC_ROLE_AUTHORIZATION",
          "path": "role.public.authorization",
          "node_group_id": 1,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        }
      ]
    },
    {
      "id": 2,
      "display_name": "帳號管理",
      "code": "ACCOUNT_MANAGE",
      "enable": "Y",
      "display": "Y",
      "public": "Y",
      "created_at": "2019-12-27 11:13:18",
      "updated_at": "2019-12-27 11:13:18",
      "nodes": [
        {
          "id": 6,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "帳號管理-讀取",
          "code": "ACCOUNT_MANAGE_READ",
          "path": "account.manage.read",
          "node_group_id": 2,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        },
        {
          "id": 7,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "帳號管理-新增",
          "code": "ACCOUNT_MANAGE_CREATE",
          "path": "account.manage.create",
          "node_group_id": 2,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        },
        {
          "id": 8,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "帳號管理-編輯",
          "code": "ACCOUNT_MANAGE_UPDATE",
          "path": "account.manage.update",
          "node_group_id": 2,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        },
        {
          "id": 9,
          "enable": "Y",
          "display": "Y",
          "public": "Y",
          "display_name": "帳號管理-刪除",
          "code": "ACCOUNT_MANAGE_DEL",
          "path": "account.manage.del",
          "node_group_id": 2,
          "created_at": "2019-12-27 11:13:18",
          "updated_at": "2019-12-27 11:13:18"
        }
      ]
    }
  ]
}
```
