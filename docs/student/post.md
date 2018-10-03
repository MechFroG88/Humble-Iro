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
{
  // student detail
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