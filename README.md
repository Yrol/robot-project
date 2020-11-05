## Toy Robot Simulation

- Application that demonstrate a robot moving on a square table.

## Prerequisites

1. Make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your local machine before setting up the project.

## Making the scripts executable

- Deploy script

```sh
sudo chmod +x ./deploy-local

```

- Application run script

```sh
sudo chmod +x ./deploy-local
```

- Down script

```sh
sudo chmod +x ./down-local
```

## Creating and launching the Laravel project

- Build and run the Docker container by executing the following bash file in the `root`.

```sh
./deploy-local
```

## Executing all test cases

```
./robot-test test
```

## Executing individual input text files

```
./robot-test move-robot Inputs/input3.txt
```

## Stopping the container

- Stop the Docker container by executing the following bash file in the `root`.

```sh
./down-local
```
