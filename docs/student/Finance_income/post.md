# Add Finance_income

`POST` /finance_income/:sid


## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "3"
}
```

# Edit Finance_income detail

`POST` /finance_income/edit/:sid

```json
[
    [
        "finance_income_id" : 1,
        "member"            : "dad",
        "income"            : "3000"
    ], ...
]
```

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Edited Succesfully"
}
```

# Delete Finance_income 

`POST` /finance_income/delete/:fid

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted Succesfully"
}
```

