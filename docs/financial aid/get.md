# Get all financial aid information

`GET` /financial_aid

```json
[
  {
    "financial_aid_id"   : 1,
    "supplier"           : "呵呵呵会馆",
    "expired_date"       : "datetime",
    "financial_aid_type" : "lol"
  },...
]
```

## Success response

**Content** : return [all us information](README.md#full-information "All aid info")

# Get financial aid information by financial aid id

`GET` /financial_aid/:fid

```json
{
  
}
```