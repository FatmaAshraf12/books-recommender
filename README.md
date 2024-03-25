
# Book Recommender

Reading recommendation system to inspire others to discover the
joy of reading and self-improvement.





## Installation

Clone the repository


```bash
 git clone https://github.com/FatmaAshraf12/books-recommender.git
```

```bash
cd books-recommender
```
Install all the dependencies using composer

```bash
 composer install
```

Run the database migrations (Set the database connection in .env before migrating)

```bash
 php artisan migrate
```

Run database seeders

```bash
 php artisan db:seed --class=UserSeeder
```

```bash
 php artisan db:seed --class=BookSeeder
```


Start the local development server

```bash
 php artisan serve
```



## Api documentaion


link for api documentation using swagger

http://127.0.0.1:8000/api/documentation

endpoint for submit reading interval : api/submit-reading-interval

endpoint for Get Most Recommended Books : api/get-recommended-books