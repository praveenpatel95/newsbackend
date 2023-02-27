# News API- Backend 

The library is developed for the manage Rest API of the get articles from multiple sources.

## Requirement

- PHP 8.1

## Installation

Clone the repository:

```
git clone https://github.com/praveenpatel95/newsbackend.git

```

Then cd into the folder with this command:
```
cd newsbackend
```

Install composer with below command:
```
composer install
```




## Quick usage 

1. Copy .env.example file and rename with .env file.<br />
Or you can run this command
`cp .env.example .env`
<br />Just update the database credentials.
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_db_name
DB_USERNAME=my_user_name
DB_PASSWORD=my_password
```


2. Now you need to run migration command for create all migrations tables:

```
php artisan migrate
```

3. Install passport, use below command:

```
php artisan passport:install
```



## Run Server

Now you can run your server with this command:
```
php artisan serve
```

## Rest API with example 

I attached the postman collection file in the repository for a better understanding and using the APIs.  Import the file in your postman and change the {{base_url}} in your postman environment.


## License

[MIT](https://choosealicense.com/licenses/mit/)
