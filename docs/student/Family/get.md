# Get student family detail

`GET` /family/:sid

## Success response

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