<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instructions
- Used Vue.js 3 for front-end operations and API.
- Included 2 tables, users and comments.
- One to many relationship was used (User has many comments).
- One test was created to test the submission of comments with user id.
- Service files for business logic are stored in the Services folder
- Created UserService for all business logic.
- Created BaseService for frequently used business logic.
- Comments are created and validated on each user page.
- Static password to comment is '00000000'.


## Routes
**web.php contains 2 routes**
- '/' loads the index page for all users.
- '/user/{id}' loads the single page for a single user and their comments

**api.php contains 3 routes**
- '/api/users' get request for all users.
- '/api/user/{id}/comment' Post, submit comment for each user.
- '/api/user/{id}/comments' Get request for each user and their comments.
