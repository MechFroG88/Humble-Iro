# Get student family detail

`GET` /family/:sid

## Success response

```
finance
├─ remarks -> (string)
├─ auto_transfer (radio) -> (0: no; 1: yes)
└─ balance = total income - total expenditure -> (int)
```