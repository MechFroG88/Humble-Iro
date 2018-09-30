# Add student

`POST` /student

```json
{
  //student full information
}
```

## Success response

**code** : `200 OK`

**content** :

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
  "student_id": 2,
  //student full information
}
```

## Success response 

**code** : `200 OK`

**content** :

```json
{
  "status": 200,
  "data"  : "Edited successfully"
}
```

# Delete student

`DELETE` /student/delete/:id

**code** : `200 OK`

**content** :

```json
{
  "status": 200,
  "data"  : "Deleted successfully"
}
```