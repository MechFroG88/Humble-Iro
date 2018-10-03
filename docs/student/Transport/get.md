# Get transport detail

`GET` /transport/:sid

## Success response

``` json
{
    "status" : "200",
    "data" : {
        [
            [
                "transport_id"    : 1,
                "transport_type"  : 1,
                "year"            : "2000",
                "model"           : "hello"
            ], ...
        ]
    }
}
```