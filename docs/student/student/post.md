# Add student

`POST` /student

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "1"
}
```

# Edit student

`POST` /student/edit/:id

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

## Success response 

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Edited successfully"
}
```

# Delete student

`POST` /student/delete/:sid

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted successfully"
}
```