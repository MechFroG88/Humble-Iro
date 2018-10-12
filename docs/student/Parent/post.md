# Add Parent

`POST` /parent/:sid


## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "3"
}
```

# Edit Parent detail

`POST` /parent/edit/:sid


``` json
[
    {
       // parents detail
    }, ...
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

# Delete Parent

`POST` /parent/delete/:pid

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted Succesfully"
}
```

