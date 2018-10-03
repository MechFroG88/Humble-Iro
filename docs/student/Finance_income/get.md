# Get student finance_income detail

`GET` /finance_income/:sid

## Success response

``` json
{
    "status" : "200",
    "data" : {
        [
            [
                "finance_income_id" : 1,
                "member"            : "dad",
                "income"            : "3000"
            ], ...
        ]
    }
}
```