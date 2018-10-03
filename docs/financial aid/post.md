# Add financial aid 

`POST` /finance

```json
{
  "supplier"           : "呵呵呵会馆",
  "expired"            : "datetime",
  "financial_aid_type" : "lol"
}
```

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Added successfully"
}
```


# Edit financial aid

`POST` /finance/edit/:id

```json
{
  "supplier"           : "呵呵呵会馆",
  "expired"            : "datetime",
  "financial_aid_type" : "lol"
}
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

# Delete financial aid

`POST` /finance/delete/:id

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted successfully"
}
```