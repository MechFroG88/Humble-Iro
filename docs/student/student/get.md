# Get student information

`GET` /student/:id

## Success response

**Content** : 

```json
student
├─ cn_name   -> (string, chinese)
├─ en_name   -> (string, english)
├─ number    -> (int)
├─ class     -> (string, chinese) *example
├─ contact   -> (int, size = 10 || size = 11)
├─ address   -> (string, english)
├─ ancestor  -> (string)
├─ score     -> (int, [0, 100])
├─ attitude -> (int, [0, 100])
├─ gender(radio)       -> (0 = male; 1 = female)
└─ birthdate(datepicker) -> (int year, month, day; format = DDMMYYYY)
```

# Get student basic information

`GET` /student/basic

## Success response

**Content** : 

```json
[
  {
  "student_id" : "1",
  "cn_name"    : "陈某某",
  "en_name"    : "Tan Mou Mou",
  "financial_aid" : [
      {
      "financial_aid_id" : 1,
      "status"     : 1
      },...
    ]
  },...
]

```

# Get student basic information by id

`GET` /student/basic/:id

## Success response

**Content** : 

```json
{
"student_id" : "1",
"cn_name"    : "陈某某",
"en_name"    : "Tan Mou Mou",
"financial_aid" : [
    {
    "financial_aid_id"  : 1,
    "financial_aid_type": "么么哒",
    "status"            : 1
    },...
  ]
}
```
