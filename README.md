# Quantox PHP test

Quick 5 hrs PHP test for applying to position in Quantox

## Getting Started

- Import sample data from qx_students.sql to Your MySQL database server


- Edit config/config.php

    - add your DB server settings
    - change URLROOT


- Edit public path in public/.htaccess:
  ```
    RewriteBase /QuantoxTest/public
  ```

### Prerequisites

You will need server with PHP 7.3.

### Installing

Just copy to your server and it is ready to go.

## Usage
- For all students list:
 ```
 example:
    http://localhost/QuantoxTest/students
  ```

- For single student report, by student id:
 ```
 example:
    http://localhost/QuantoxTest/students/1
  ```

## Built With

* [PHP](https://www.php.net/downloads.php#v7.3.27) - PHP programming language

## Authors

* **Ivan Stojanović**


## License

This project is licensed under the Creative Commons License - see the [LICENSE.md](LICENSE.md) file for details.