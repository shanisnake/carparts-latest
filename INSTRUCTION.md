###  installation :-
            1. update database credentials in the .env file and docker-compose.yml file.
            currently using "new_ps_docker" this is the username and password of the database.

            2. run composer update for generating vendor directory and download libraries.

###  Run docker :-

      1. docker-compose up -d  && docker-compose build.

          uses:- this will generate docker images.

###  IMOPORT DATABASE :-
        INS:- carp_pgsql_1 :- docekr pgsql image name ,
              new_ps_docker :- user name of pgsql,
              442215records.pgsql :- file name of dumped deta base which will be import.
       
        command :-
        1. docker exec -i carp_pgsql_1 psql --username new_ps_docker [--password new_ps_docker] new_ps_docker < /442215records.pgsql ;

### EXPORT DATABASE :-
        INS:- carp_pgsql_1 :- docekr pgsql image name ,
              new_ps_docker :- user name of pgsql,
              8lakh_records.pgsql :- file name of dumped deta base.

        command :-
        1.  docker exec carp_pgsql_1 pg_dump -U new_ps_docker > 8lakh_records.pgsql; 
            

### LOGIN TO POSTGRES DOCKER :-
        INS:- carp_pgsql_1 :- docekr pgsql image name ,
              USERNAME :- user name of pgsql,


        commands :-
        1.  docker exec -it carp_pgsql_1 bash; 
        2.  psql -U USERNAME

###  IMPORT SCRIPT RUN --working :-

      1.  docker exec -it carp_laravel.test_1 /bin/bash
      2.   php artisan cache:clear
      2.  php artisan create:importdata



### IMPORTENT :-
      This code should be enabled after moving the site to production.

      a. Please enable  HTTPS code  code from the AppServiceProvider.php 

            INS:- This is the code which is enabled from boot function.
            // $this->app['request']->server->set('HTTPS','on');

      b. Location of file :- "crap/app/Providers/AppServiceProvider.php"


