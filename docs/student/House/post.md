# Add House

`POST` /house/:sid


## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "3"
}
```

# Edit House detail

`POST` /House/edit/:sid


``` json
[
    [
        "house_id"    : 1,
        "house_type"  : "而咳咳",
        "house_state" : "1"
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

# Delete House 

`POST` /house/delete/:hid

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted Succesfully"
}
```

