# Add financial aid 

`POST` /financial_aid

```json
{
  "supplier"    : "呵呵呵会馆",
  "financial_aid_type": "哈哈哈基金",
  "expired_date": "21032019"
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
  "supplier"    : "呵呵呵会馆",
  "financial_aid_type": "哈哈哈基金",
  "expired_date": "21032019"
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