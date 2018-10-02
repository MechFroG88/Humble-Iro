# Add financial aid 

`POST` /finance

```json
{
  "title"   : "哈哈哈基金",
  "supplier": "呵呵呵会馆",
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
  "name" : "lol"
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