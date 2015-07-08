# phalcon-rest

```
hub clone kobabasu/phalcon-rest mvc
```

document rootにmvcディレクトリに展開することを想定し設定  
もしmvcを別の名前にする際には以下２ヶ所を変更
* /app/config/config.php内のbaseurl
* /.htaccess内のパス

## vagrant
1. `hub clone cores/cores-vagrant coreos`
1. `cd coreos`
1. 必要なファイルをリネーム  
   * `mv user-data.sample user-data`
   * `mv config.rb.sample config.rb`
1. Vagrantfile編集  
   `vim Vagrantfile`
   * `$instance_name_prefix = "任意の名前"`
   * NFSの設定
   * portの設定 80->8080, 443->3443, 3306->3306
1. `vagrant up`

## docker
1. `vagnrat ssh`
1. mysqlコンテナ起動
```
docker run --net=host --name mysql -p 3306:3306 -e "ROOT_PW=..." -e "DB_NAME=..." -e "DB_USER=..." -e "DB_PASS=..." -d kobabasu/mysql:0.74
```
1. apacheコンテナ起動
```
docker run --net=host --name -p 80:80 -p 443:443 -v /home/core/share/app:/var/www/html -d kobabasu/apache:0.21
```
1. `exit`

## mysql
1. table作成
```
mysql -h 0.0.0.0 --port 3306 -u[username] -p[password] -d [dbname] < sql api/sql/user.sql
```

## phalcon
* voltは自動でコンパイルされるため普通にソースを変更すれば問題ない

1. 必要があればdevelopブランチを使う  
1. mvcディレクトリの名前を変更した場合には以下２ヶ所を変更
   * /app/config/config.php内のbaseurl
   * /.htaccess内のパス

## check
apple, bananaはただの変数参照でDBとは無関係  
/app/controllers/IndexController.php内に記述

1. http://localhost:8080/mvc/public/で確認
1. signupのリンクをクリックしうまくジャンプしなければconfig.phpを確認
1. 登録しthankyouが表示されなければDB設定を確認
1. 登録後のviewは用意していないため登録の確認は直接DBを確認
