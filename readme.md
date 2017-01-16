# About Laravel blog

Laravel blog is a very small application to show, add and delete blog

## Build

```bash
# This container should run unit tests, build the app, and run integration tests.
# At the moment, it is only building.
docker build -f Dockerfile.test -t vfarcic/laravel-test .

docker run -it --rm \
    -v $PWD:/src \
    vfarcic/laravel-test

docker build -t vfarcic/laravel .

docker run -d --name laravel \
    -p 8080:80 \
    vfarcic/laravel

curl "http://localhost:8080/index.php"

docker exec -it laravel cat /var/log/nginx/adminer.dev-error.log
```