# search

A search form built using:
* Symfony 4
* Composer - Dependency Manager

---

To install:

1. Download or git clone project
    ```
   git clone https://github.com/jasonvpham/search.git
    ```
    
2. In root of project, install dependencies 
    ```
   composer install
    ```
    
3. Configure the database in the .env file  
    ```
    # customize this line!
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
    ```   
    
4. To run Symfony Local Web Server
    ```
    php bin/console server:start
    ```
