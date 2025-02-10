# EFSC-Inventory Project

## Maintainers:
- Arron C.
  - Discord:
  - Github:
- Jon M. 
  - Discord:
  - Github:

## Project structure

___

### root directory 
- docker
- src
  - api
    - mixins
  - assets
  - classes
    - database
  - css
  - javascript
  - templates
  - .htaccess
  - auth.php
  - index.php
  - SQLOp.php
  - wLinventory.php
- .dockerignore
- .env
- docker-compose.yaml
- README.MD


`docker` -> Contains Dockerfile(s) which build the container(s) in the docker-compose.yaml file

`src` -> root directory for the PHP application

`api` -> logic layer that access the classes, injest and returns data. Processes frontend requests and interacts with backend logic.

`mixins` -> Contains helper functions for API operations.

`assets` -> Stores static assets like images, fonts, or downloadable content.

`classes` -> Contains the PHP class definitions for object oriented programming (OOP) structure. Database tables interaction through Objects

`database` -> Contains the class for the database connection

`css` -> Contains the stylesheets for the frontend interface.

`javascript` -> Javascript files for templates to use with frontend activity and logic.

`templates` -> Contains HTML/PHP templates for rendering views

`.htaccess` -> Apache configuration file for URL rewriting, access control, or security settings. 

`auth.php` -> Perform request authentication. Ensures a user is logged in. Verifies access level of the user (session management & access control).

`index.php` -> Main point of entry for the application. URL's are defined here. Acts as a router for the application by routing requests and loading dependencies. Must have a .htaccess file when using Apache

`SQLOp.php` -> Performs database CRUD operations. Connects classes, database classes & functions as a 'settings' file for application

`wLinventory.php` -> contains global variables

`.dockerignore` -> Specifies files and directories to exclude from the Docker build context.

`.env` -> Defines Docker services, networks, and volumes for running the application in a containerized environment. Accessed by docker-compose.yaml

`docker-compose.yaml` -> Defines Docker services, networks, and volumes for running the application in a containerized environment

---

## How to build application from source code:

> ** Install Git

> ** Install XAMPP (or whatever tool you want to use to run a development apache webserver & MySQL Database & PHPMyadmin locally)
  
You can also use other tools to run your project locally. Certain IDE's for instance allow for this, but you would need to install mysql separately and manage it through command line.


1. Create a directory in
```C:\xampp\htdocs\<your project name>\```
2. After setting up Git run this command to pull down the repo
```git pull *git repo here> .```
3. intialize your new project using git init
```git init```
4. add your .env file with the following information:
```
MYSQL_DATABASE=database_name_here
MYSQL_USER=mysql
MYSQL_PASSWORD=changeme
MYSQL_HOST=mysql
MYSQL_PORT=3306
MYSQL_ROOT_PASSWORD=changeme
```

> ensure you change database, user, and passwords to your desired settings

---

## How to build this application using Docker:

** Docker Desktop must installed on your system

1. Follow steps 2, 3, 4 from the above directions
2. make sure you are in the root of your directory (where the docker-compose.yaml file is)
2. Run the following command:
```
docker-compose up -d --build
```
3. Access PHPMyAdmin http://localhost:8081 
4. Create a new database
5. Import the database file (). This will create the tables, provide starter test data, and 3 test users to log in with.
