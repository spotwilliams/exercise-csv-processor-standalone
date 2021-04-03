#How to use the app
### Stack:

* Docker and Docker-Compose
* PHP 7.4
* Postgres 11 (this container has the DB ready to be used)

### Run and up:

`docker-compose up` on the console. Please be sure to be on the root of project

### Login:
Current credentials are: admin / admin

### Upload file
Example of what data should the file have

```csv
city,product,units,price,sales
San Diego,apple,2,5,15
Austin,apple,5,5,12
```

### Register column

New columns are stored as formulas object into DB.