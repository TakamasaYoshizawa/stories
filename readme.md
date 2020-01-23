## こんてなのたちあげ
```
cd /Users/yoshizawatakamasa/workspace/docker-laravel
docker-compose up -d
```

## こんてながたちあがっているのかかくにんするのは

これはどこでもできる
```
docker ps
```


```
docker-laravel_web_1
docker-laravel_mail_1
docker-laravel_redis_1
docker-laravel_app_1
docker-laravel_node_1
docker-laravel_db_1
```

composer artisan とか じっこうする
docker-laravel_app_1

せつぞくのしかた
```
docker exec -it docker-laravel_app_1 ash
```

npm
docker-laravel_node_1
```
docker exec -it docker-laravel_node_1 ash
```
db

docker-laravel_db_1

```
docker exec -it docker-laravel_db_1 bash
```

