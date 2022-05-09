###  installation :-
            1. update database credentials in .env file and docker-compose.yml file.
            currentily using "new_ps_docker" this is as username and password of database.

            2. run composer update for gerate vendor directory and download libraries.

###  Run docker :-

      1. docker-compose up -d  && docker-compose build.

          uses:- this will genrate docker images.

###  IMOPORT DATABASE :-

        1. docker exec -i carp_pgsql_1 psql --username new_ps_docker [--password new_ps_docker] new_ps_docker < /442215records.pgsql ;

            

### LOGIN TO POSTGRES DOCKER :-
        1.  docker exec -it carp_pgsql_1 bash; 
        2.  psql -U USERNAME
