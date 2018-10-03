# Add Transport

`POST` /transport/:sid


## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "3"
}
```

# Edit Transport detail

`POST` /transport/edit/:sid


``` json
[
    [
        "transport_id"    : 1,
        "transport_type"  : 1,
        "year"            : "2000",
        "model"           : "hello"
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

# Delete Transport

`POST` /transport/delete/:tid

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted Succesfully"
}
```

