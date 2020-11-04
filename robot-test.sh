#!/bin/bash

if [ "$1" == "test" ]; then
  docker exec -it php bash -c "php application test"
fi