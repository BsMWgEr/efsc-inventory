# EFSC-Inventory Project

## Maintainers:
- Arron C.
  - Discord: romiitor
  - GitHub: https://github.com/Romii646
- Jon M. 
  - Discord: jmcgaha
  - GitLab: https://gitlab.js-devs.com/jmcgaha
  - GitHub: https://github.com/BsMWgEr

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

## How to build/run application from source code:

> ** Install Git - Required for both options

Option 1 (Preferred & Easier):
> ** Install XAMPP (or whatever tool you want to use to run a development apache webserver & MySQL Database & PHPMyadmin locally)
> ** Launch MySQL and MySQLAdmin to set up your database to match your env file - user - password - database
---
OR:

Option 2 (Advanced - Only use this method if you know what your doing):

- This method requires knowledge of database configuration/administration through command line/terminal
- Also requires php configuration through config files
> ** If you do not install XAMPP - Make sure to install PHP directly and follow the instructions listed directly below

> ** Install MySQL and set up user - database - password - port that matches
> your env file

>Make note of where your php directory is.
>Your IDE may need you to specify where your php.exe and php.ini file
> are located. The php.ini contains configurations for php. You may
> need to make small adjusts to this. You may have to manually enable
> your database extension in pip.ini.

Debugging issues (if database connection issues):
- In your php.ini file find section labeled Dynamic Extensions
Then line labeled ;extension=pdo_mysq and uncomment by removing the semicolon.
Also, depending on your drive configuration, you may need to manually specify
the location of the extension as well. This file is located in your
main php directory called ext and the file, if using mysql is called
php_pdo_mysql.dll. 
- If you are using a different database, follow the same method, but apply to whichever db you are using. 

Below are 2 variations in which you may have your dynamic extension for
your database module enabled in php.ini

** php.ini may also be called php.ini-development **
(there is a separate ini file for production)
- The difference between a development and production ini file is the error messaging
- developement ini displays detailed error messages for debugging which are unsafe to use in production

```
extension=pdo_mysql
```

```
extension="D:\php\ext\php_pdo_mysql.dll"
```
  
You can also use other tools to run your project locally. Certain IDE's for instance allow for this, but you would need to install mysql separately and manage it through command line.

---
>If using Option 1 - Follow these steps in order

>If using Option 2 - Skip step 1
1. Create a directory in

```C:\xampp\htdocs\<your project name>\```
2. After setting up Git run this command to pull down the repo or if you really don't want to use git you can also download the repo as a zip file from the GitHub Repo. Just click the button that says code and then click download Zip.

```
git clone https://github.com/BsMWgEr/efsc-inventory.git .
```
OR:
```
git clone https://gitlab.js-devs.com/efsc-inventory.git .
```

- (adding the . after the command clones it into the current folder you are in. If you remove the . it will clone it into a new folder)
3. Delete .git from the directory and intialize your new project using git init.

```
git init
```

4. Create a new repo on GitHub or GitLab

```
git remote add origin <your-new-repo>
```

```
git add .
```

```
git commit -m "your message here"
```

```
git branch -M main
```

```
git push -u origin main
```
5. add your .env file with the following information:
6. Launch Apache & MySQL in XAMPP if you haven't already done so (Make sure you completed the steps above already and configured your database using MySQLAdmin to match your env file config)
```
MYSQL_DATABASE=database_name_here
MYSQL_USER=mysql
MYSQL_PASSWORD=changeme
MYSQL_HOST=mysql
MYSQL_PORT=3306
MYSQL_ROOT_PASSWORD=changeme
```

> change database, user, and passwords to your desired settings

> ** Ensure the database settings match the env file **

---

## How to build this application using Docker:

** Docker Desktop must installed on your system

1. Follow steps 2, 3, 4, 5 from the above directions
2. make sure you are in the root of your directory (where the docker-compose.yaml file is)
2. Run the following command:
```
docker-compose up -d --build
```
3. Access PHPMyAdmin http://localhost:8081 
4. Create a new database
5. Import the database file (). This will create the tables, provide starter test data, and 3 test users to log in with.
