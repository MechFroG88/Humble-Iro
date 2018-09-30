# GET student details

> All inputs require verification

## Success response

**code** : `200 OK`

**content** :

## Full information
```
student
├─ cn_name   -> (string, chinese)
├─ en_name   -> (string, english)
├─ number    -> (int)
├─ class     -> (string, chinese) *example
├─ contact   -> (int, size = 10 || size = 11)
├─ address   -> (string, english)
├─ ancestor  -> (string)
├─ score     -> (int, [0, 100])
├─ aittitude -> (int, [0, 100])
├─ photo     -> (file, type = ".jpg .png .gif")
├─ gender(radio)       -> (0 = male; 1 = female)
├─ birthdate(dropdown) -> (int year, month, day; format = DDMMYYYY)
└─ financial_aid(dropdown) -> (string, id)
```

```
father
├─ cn_name    -> (string, chinese)
├─ en_name    -> (string, english)
├─ age        -> (int)
├─ contact    -> (int, size = 10 || size = 11)
├─ occupation -> (string)
├─ work_place -> (string)
├─ work_address -> (string, english)
├─ boss_contact -> (int, size = 10 || size = 11)
├─ relation(dropdown)     -> (0 = father; 1 = guardian)
└─ ic_number(3 input box) -> (int; format = XXXXXX XX XXXX)
```

```
mother
├─ cn_name    -> (string, chinese)
├─ en_name    -> (string, english)
├─ age        -> (int)
├─ contact    -> (int, size = 10 || size = 11)
├─ occupation -> (string)
├─ work_place -> (string)
├─ work_address -> (string, english)
├─ boss_contact -> (int, size = 10 || size = 11)
├─ relation(dropdown)     -> (0: mother; 1: guardian)
└─ ic_number(3 input box) -> (int; format = XXXXXX XX XXXX)
```

```
siblings
├─ age       -> (int)
├─ cn_name   -> (string, chinese)
├─ aid_total -> (int)
├─ got_aid(checkbox)  -> (0: no; 1: yes)
├─ relation(dropdown) -> (0: older brother; 1: younger brother; 2: older sister; 3: younger sister)
└─ financial_aid(dropdown) -> (id)
```

```
family
├─ single_reason  -> (string, chinese)
├─ family_size    -> (int)
├─ working_people -> (int)
├─ primary_people -> (int)
├─ smk_people     -> (int)
├─ smp_people     -> (int)
├─ uni_people     -> (int)
├─ disabled (radio)  -> (0: no; 1: yes)
├─ disabled_relation -> (string, chinese)
└─ single_parent (radio) -> (0: no; 1: yes)
```

```
finance
├─ income
│  ├─ dad   -> (int)
│  ├─ mom   -> (int)
│  ├─ total -> (int)
│  ├─ guardian     -> (int)
│  ├─ other_member -> (int)
│  └─ other_aid [title, value] (add-button) -> (string: title; int: value)
│ 
├─ expenditure
│  ├─ car   -> (int)
│  ├─ food  -> (int)
│  ├─ house -> (int)
│  ├─ medic -> (int)
│  ├─ astro -> (int)
│  ├─ total -> (int)
│  ├─ utility   -> (int)
│  ├─ telecomm  -> (int)
│  ├─ transport -> (int)
│  ├─ school      [title, value] (add-button) -> (string: title; int: value)
│  ├─ tuition     [title, value] (add-button) -> (string: title; int: value)
│  └─ other_spend [title, value] (add-button) -> (string: title; int: value)
│ 
├─ remarks -> (string)
├─ auto_transfer (radio) -> (0: no; 1: yes)
└─ balance = total income - total expenditure -> (int)
```

```
detail
├─ aircond     -> (int)
├─ other_house -> (string, chinese)
├─ house_state (radio)   -> (0: rent; 1: paid; 2: paying)
├─ house_type (dropdown) -> (string, chinese)
└─ transport [type(dropdown), model, year] -> ((0: motor; 1: car): type; string: model; int: year)
```

## Basic information
| status id | status |
| :-------: | :----: |
| **0**     | 不批准 |
| **1**     | 已批准 |
| **2**     | 未审核 |
```
student
├─ cn_name  -> (string, chinese)
├─ en_name  -> (string, english)
├─ aid_type -> (string)
└─ status   -> (id)
```
