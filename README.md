# challenge
お問い合わせフォーム

環境構築
Dockerビルド
　1.git clone リンク
　git@github.com:chatainazara/challenge.git
　2.docker-compose up -d -build

Laravel環境構築
1.docker-compose exec php bash
2.composer install
3. .env.exampleを複製し.envを作成
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

使用技術
 PHP v8.4.7
 Laravel v8.83.29
 MySQL  8.0.26

ER図
[<img width="150" src="img.challenge.drawio.svg">](https://github.com/chatainazara/challenge/issues/9#issue-3230781263)
