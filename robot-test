#!/bin/bash

if [ "$1" == "test" ]; then
  docker exec -it php bash -c "php application test"
elif [ "$1" == "move-robot" ] && [ -n "$2" ]; then
  docker exec php bash -c "php application move-robot $2"
elif [ "$1" == "move-robot" ]; then
  docker exec php bash -c "php application move-robot"
fi

