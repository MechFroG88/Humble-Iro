# Add Finance_expenditure

`POST` /finance_expenditure/:sid

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "3"
}
```

# Edit Finance_expenditure detail

`POST` /finance_expenditure/edit/:sid

```json
[
    [
        "finance_expenditure_id" : 1,
        "object"                 : "car",
        "expenditure"            : "3000"
    ], ...
]
```

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Edited Successfully"
}
```

# Delete Finance_expenditure 

`POST` /finance_expenditure/delete/:fid

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted Succesfully"
}
```

