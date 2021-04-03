#How to use the app:
This app requires login credentials.

You will see a section to login, upload file and register new columns. The csv will be stored on DB (processed) and located on `root/var` folder.

### Stack:

* Docker and Docker-Compose
* PHP 7.4
* Postgres 11 (this container has the DB ready to be used)

### Run and up:

`docker-compose up` on the console. Please be sure to be on the root of project.

After that you should connect to database with the credentials:
* DB: catexercise
* User: catexercise
* Pass:  catexercise
* Host: 127.0.0.1
* Port: default (5432)

And execute db.sql script (copy/paste)

Then you can access the app by http://localhost:81

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

### Folder structure:

The project has an MVC approach. In where the controllers and views are stored under `app` folder, and models and logic under `src` folder.  
* `app` folder: contains the controllers and views 
* `src` folder: contains the logic of the business.
    * `Exceptions` (is not complete, so in some parts of the code will find throws of the `\Exception` class)
    * `Models` has the representation of data from the CVS and also the columns defined by user. The columns are represented by the `FileProcessor\Models\Formula` class.
    * `Repositories` are classes that interact with database and store or read models
    * `Services` has two classes, one for read the csv and other for columns "creation"
    * `tests` a sort of manual tests (only for dev purposes. I was making some tests before to develop frontend)
    * `var` folder to locate uploaded files
    * `app.php` is a class that has the responsibility to route and create controllers with dependencies
    * `secure.php` is a class that wraps the App class and give a very simple security check
    * `config.php` have the DB credentials

* `docker` has the docker files required to generate the containers properly
* `public` is the entry point of the app. 
    