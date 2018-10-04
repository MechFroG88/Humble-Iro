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
├─ photo     -> (file, type = ".jpg .png .gif")
├─ gender(radio)       -> (0 = male; 1 = female)
├─ birthdate(datepicker) -> (int year, month, day; format = DDMMYYYY)
├─ financial_end(dropdown) -> (int year, month, day; format = DDMMYYYY)
└─ financial_aid(dropdown) -> (id)
```

# Get student basic information

`GET` /student/basic

## Success response

**Content** : 

```json
{
  "student_id" : "1",
  "cn_name"    : "陈某某",
  "en_name"    : "Tan Mou Mou",
  "financial_aid"   : ["啦啦啦基金",...],
}
```
