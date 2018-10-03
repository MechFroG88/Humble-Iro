# Get sibling detail

`GET` /sibling/:siid

## Success response

``` json
siblings
├─ sibling_id -> (int)
├─ age        -> (int)
├─ cn_name    -> (string, chinese)
├─ aid_total  -> (int)
├─ got_aid(checkbox)  -> (0: no; 1: yes)
├─ relation(dropdown) -> (0: older brother; 1: younger brother; 2: older sister; 3: younger sister)
└─ financial_aid(dropdown) -> (id)
```

# Get sibling basic

`GET` /sibling/basic/:sid

## Success response

``` json
siblings (array)
├─ sibling_id -> (int)
└─ relation(dropdown) -> (0: older brother; 1: younger brother; 2: older sister; 3: younger sister)
```