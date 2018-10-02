# Add student

`POST` /student

```json
{
  //student full information
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

# Edit student

`POST` /student/edit/:id

```json
{
  //student full information
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

`POST` /student/delete/:id

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted successfully"
}
```