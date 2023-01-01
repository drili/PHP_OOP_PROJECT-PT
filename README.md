# PHP OOP Project #1

### Prerequisites
    - Apache Server
    - MySql Database
    - Composer
        - Dependencies:
            * https://github.com/vlucas/phpdotenv
    - .env setup

##### Composer install depenendies
```$ composer require vlucas/phpdotenv```

##### Variable composition @ .env
```
HOSTNAME=""
USERNAME=""
PASSWORD=""
DATABASE=""
```

##### Define "$root_directory" @ "../parts/header_pre.php"
```
$root_directory = $_SERVER['DOCUMENT_ROOT'] . "{{YOUR_PROJECT_DIRECTORY_NAME}}";
```

### Task list
- [x] Setup dynamic directories
- [x] Setup folder and file structure
- [x] Setup database connection
- [x] Add composer dependency for .env file
- [x] Add libraries: CSS Foundation ZURB, jQuery and reset CSS
- [x] Setup "User" class
- [x] Setup "Form" component
- [x] Setup "SuccessStatus" (js component) component
- [ ] Create a "Login" form and use PHP to login the user using "email" and "password" as parameters.
- [ ] Start CSS styling (global- and component-based styling)