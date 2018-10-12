# Get parent detail

`GET` /parent/:sid

## Success response

``` json
parents
├─ parent_id  -> (int)
├─ cn_name    -> (string, chinese)
├─ en_name    -> (string, english)
├─ age        -> (int)
├─ contact    -> (int, size = 10 || size = 11)
├─ occupation -> (string)
├─ work_place -> (string)
├─ work_address -> (string, english)
├─ boss_contact -> (int, size = 10 || size = 11)
├─ relation(dropdown)     -> (0 = father; 1 = mother; 2 = guardian)
└─ ic_number(3 input box) -> (string; format = XXXXXX XX XXXX)
```

# Get parent basic

`GET` /parent/basic/:sid

## Success response

``` json
parents (array)
├─ parent_id  -> (int)
└─relation(dropdown)     -> (0 = father; 1 = mother; 2 = guardian)
```