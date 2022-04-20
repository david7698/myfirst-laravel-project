# My first Laravel project

## 1 Database

## migration

tutte le operazioni di struttura di database vengono gestite dalle migrations.

#### *per creare una nuova tabella:*

`php artisan make:migration create_nome_tabella_table`

esempio: database\migrations\2022_04_19_133501_add_table_category.php
#### *per aggiungere una colonna ad una tabella:*
`php artisan make:migration add_col_name_to_nome_tabella_table`

esempio: database\migrations\2022_04_07_140210_add_pages_number_to_book_table.php

le operazioni non vengono eseguite fino a che non lanci il comando: `php artisan migrate`.

con il comando: `php artisan migrate:status` vengono visualizzate tutte le operazioni gia eseguite e quelle che verranno eseguite se si lancia il comando precendente.

per tornare indietro si può usare il comando: `php artisan migrate:rollback`

con il comando `php artisan migrate:fresh --seed` ricrea il database da zero.

## seeds

con i seeds puoi riempire le tabelle con i dati:

`php artisan make:seeder NomeSeeder`

esempio: database\seeders\BookSeeder.php

per lanciare il seeder:

`php artisan db:seed --class=NomeSeeder`


## 2 Eloquent Model(ORM)

la rappresentazione di una tabella a object.

per creare un model:

`php artisan make:model nomeModel`

in un model posso definire degli attributi predefiniti:

esempio: app\Models\books.php




