# Add Sibling

`POST` /sibling/:sid


## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "3"
}
```

# Edit Sibling detail

`POST` /sibling/edit/:sid


``` json
[
    [
       // siblings detail
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

# Delete Sibling

`POST` /sibling/:siid

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted Succesfully"
}
```

