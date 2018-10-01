# Get student full information

`GET` /student

```json
{
  //student full information
}
```

## Success response

**Content** : return [all student information](README.md#full-information "used in audit student page")

# Get student basic information

`GET` /student/basic

```json
{
  "cn_name" : "陈某某",
  "en_name" : "Tan Mou Mou",
  "aid_type": "啦啦啦基金",
  "status"  : 0
}
```

## Success response

**Content** : return [basic student information](README.md#basic-information "used in student list page")