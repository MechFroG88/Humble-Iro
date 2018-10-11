# Add Student Financial Linkage

`POST` /student_financial

``` json
{
  "student_id" : 3,
  "financial_aid_id" : 1,
}

```

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Added Successfully"
}
```

# Verify Student Financial Linkage

`POST` /student_financial/verify

``` json
{
  "student_id" : 3,
  "financial_aid_id" : 1,
}

```

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Verified Successfully"
}
```

# Delete Student Financial Linkage

`POST` /student_financial/delete

``` json
{
  "student_id" : 3,
  "financial_aid_id" : 1,
}

```

## Success response

**Code** : `200 OK`

**Content** :

```json
{
  "status": 200,
  "data"  : "Deleted Successfully"
}
```

