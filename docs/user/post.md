# Add User

`POST` /user

```json
{
  "username" : "hello",
  "password" : "hello"
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

# Change password

`POST` /user/change/password

```json
{
  "old": "hello",
  "new": "LOLOL"
}
```

## Success response 

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Password changed successfully"
}
```

# Delete user

`POST` /user/delete/:id

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted successfully"
}
```