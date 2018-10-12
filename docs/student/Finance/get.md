# Get student family detail

`GET` /finance/:sid

## Success response

```
finance
├─ remarks -> (string)
├─ auto_transfer (radio) -> (0: no; 1: yes)
└─ balance = total income - total expenditure -> (int)
```