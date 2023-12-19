# BLOG PAGE LARAVEL
## ■ Introduction
During my internship at ZIGExN VeNtura Co., I was able to apply the knowledge I gained from the training process. With the guidance and support of my mentors, I successfully built a Blog Page project using the Laravel Framework. This project consists of two main pages: a Blog Page for users and a Page Admin for managing posts and users.

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
### 1. Page Blog for User
#### 1.1. Page Blog:
- Page Blog show lists of post for user.

![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/5a4b179c-a8ed-4047-8a54-4c28765620e7)

#### 1.2. Page Detail Blog:
- Page Detail Blog show detail of blog for user, including title, date created, description and author.

![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/64650b7e-c7e9-4759-b8dc-dbcd77d1d43d)

### 2. Page Admin
#### 2.1. Login:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/bbe8a5e3-7fd6-4c77-8b0b-b1fce6479bf7)

#### 2.2. Users Management - List Users:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/b4ddd9e0-a54a-4a5d-b269-742d9107b6f0)

#### 2.3. Users Management - Detail User:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/515dce29-95cc-496e-997a-59de8c54a472)

#### 2.4. Users Management - Add User:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/5aaa08d7-5dc5-4976-91a1-7ea90c3af1a1)

#### 2.5. Users Management - Edit User:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/817869c8-5753-4fac-a874-a1454e49cbef)

#### 2.6. Users Management - Delete User
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/1a936ba0-9cdc-46b1-9b52-58c4dace644f)


#### 2.7. Posts Management - List Posts:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/8ee74811-b28e-4c48-b1e4-031da755db27)

#### 2.8. Posts Management - Add Post:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/4a032df0-30f4-447b-b2c7-d04bcad467d9)

#### 2.9. Posts Management - Edit Post:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/6a71bd5e-e96e-4a74-9a46-eb4d489e5e41)

#### 2.10. Posts Management - Delete Post:
![image](https://github.com/anhlp1212/blog_laravel/assets/147794362/a97d5fb4-b953-49e3-bb57-df5172fa0e1e)

