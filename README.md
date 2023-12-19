**BLOG PAGE LARAVEL**
## ■ Introduction
During my internship, I was able to apply the knowledge I gained from the training process. With the guidance and support of my mentors, I successfully built a Blog Page project using the Laravel Framework. This project consists of two main pages: a Blog Page for users and a Page Admin for managing posts and users.

## ■ Install
|               |      Infomation    |    Note    |
| :-------------|:-------------------|:-----------|
| 1. Node version | 18.18.2 ||
| 2. NPM versipn | 9.8.1 ||
| 3. Docker |||

|               |      Step setup    |    Note    |
| :------------|:------------------|:----------|
| 1. Clone source | run "https://github.com/anhlp1212/blog_laravel.git" in terminal | HTTPS |
|                 | run "[git@github.com:anhlp1212/blog_laravel.git](git@github.com:anhlp1212/blog_laravel.git)" in terminal | SSH |
| 2. Build docker | 1. run "docker compose build" in terminal at project Blog Laravel ||
|                 | 2. run "docker compose exec app composer install"||
| 3. Start docker | run "docker compose up -d" in terminal at project Blog Laravel ||
| 4. Run migration | ./vendor/bin/sail artisan migrate ||
| 5. Run dataseeder | ./vendor/bin/sail artisan db:seed ||	
| 6. Run NPM | - npm install ||
|            | - npm run dev ||
| 7.Done, run web | Run Page Blog: http://localhost:8080/ ||
|                 | Run Page Admin: http://localhost:8080/admin/login ||

## ■ Technologies Used
1. [Laravel 10](https://laravel.com/docs/10.x)
2. [Boostrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
3. [Jquery 3](https://www.npmjs.com/package/jquery)
4. [Laravel-mix 6](https://laravel-mix.com/docs/6.0/installation)
5. [Tinymce 6](https://www.tiny.cloud/docs/tinymce/6/)
6. [VueJS 2](https://v2.vuejs.org/)

## ■ List of features 
### 1. Page Blog:
Page Blog show lists of post for user.
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/5a4b179c-a8ed-4047-8a54-4c28765620e7)
