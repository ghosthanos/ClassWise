# ClassWise website 

## Pre-requisite 

- MySQl database with database name classroom, and table name data with fields 

```
id int -> auto increment
s_id int 
msg text 
file text 
file_content mediumblob
```

- Should have php installed 

## Execution

- Run these commands in terminal after cloning the repo

```
cd ClassWise
php artisan serve
```