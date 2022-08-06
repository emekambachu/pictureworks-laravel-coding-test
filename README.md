<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instructions
- Used Vue 3 for front-end operations.
- Included 2 tables, users and comments.
- One to Many relationship was used (User has many comments)
- One test was created to test the submission of comments with user id

## Routes
**web.php contains 2 routes**
- '/' loads the index page for all users.
- '/user/{id}' loads the single page for a single user and their comments

**api.php contains 3 routes**
- '/api/users' get request for all users.
- '/api/user/{id}/comment' Post request for each user comment.
- '/api/user/{id}/comments' Get request for each user and their comments.
