###  installation :-
            1. update 


docker system prune --volumes -a


conect to docker
  1. docker exec -it carp_pgsql_1 bash;     
  2. psql -U new_ps_docker

carp_pgsql_1

  docker exec -i carp_pgsql_1 psql --username new_ps_docker [--password new_ps_docker] new_ps_docker < /442215records.pgsql ;


run file :-
      cat test.txt | docker-compose run --rm carparts-import 