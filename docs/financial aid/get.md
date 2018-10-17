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

# Get financial aid information by financial aid id

`GET` /financial_aid/:fid

## Success response

```json
{
  "financial_aid_id"   : 1,
  "supplier"           : "呵呵呵会馆",
  "expired_date"       : "datetime",
  "financial_aid_type" : "lol",
  "student"            : [
    {
    "student_id" : 1,
    "status"     : 1
    },...
  ]
}
```

