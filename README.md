# Pinterest-like 📚

## Requirements 🚀

1. Install [Node 19](https://nodejs.org/en/)
2. Install [Composer](https://getcomposer.org/download/)
3. Install [Postman](https://www.postman.com/downloads/)
4. Install [PHP ^8.0.2](https://www.php.net/downloads)

### macOS

1. Install PHP
   `brew install php`
2. Make sure the ~/.composer/vendor/bin directory is in your system's "PATH".
3. Install Laravel Valet as a global Composer package
   `composer global require laravel/valet`
4. Execute Valet's install command
   `valet install`
5. Register a directory on your machine that contains your application
    ```
    cd ~/Sites // Place where the-news folder is located
    valet park
    ```
    Now, the site that was linked may be accessed at `your-project-folder.test` this wil be the main url

### Windows

Use [XAMPP](https://www.apachefriends.org/es/download.html)/[WAMPP](https://www.apachefriends.org/es/download.html) or any other local Apache/NGnix/PHP/MySQL package that helps you run a PHP app easily.

If you want to install [Apache](https://httpd.apache.org/docs/current/platform/windows.html)/[NGinx](https://nginx.org/en/download.html), [PHP](https://windows.php.net/download#php-8.1) and [MySQL](https://dev.mysql.com/downloads/installer/) by their own you can also do it.(You must configure your PHP environment by yourself)

## Installation 🔧

1. Navigate on the terminal/cmd to project folder
2. `npm install`
3. `composer install`
4. Update the `.env` file to include a new database

```
DB_CONNECTION=mysql
DB_HOST=your-host
DB_PORT=your-port
DB_DATABASE=your-database
DB_USERNAME=your-user
DB_PASSWORD=your-password
```

5. Run migrations `php artisan migrate `
6. Run database seeders (to add dummy data) `php artisan db:seed `
7. Update the `.env` file to include your AWS S3 config

```
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=
```

## Usage 🎮

## API

Use this postman collection.
Create a variable `site_link`, for the value use your project's url

### Authentication

---

### Login

Endpoint:

```
{{site_link}}/api/login
```

Method:

```
POST
```

Request body:

```javascript
{
    "username": "your-email",
    "password": "your-password"
}
```

Response example:

```javascript
{
   {
    "message": "SUCCESS",
    "data": {
        "token_type": "Bearer",
        "expires_in": 00000,
        "access_token": "some-cool-token",
        "refresh_token": "some-other-token"
    }
}
}
```

### Logout

Endpoint:

```
{{site_link}}/api/logout
```

Method:

```
POST
```

Request headers:

```javascript
{
    "Accept": "application/json",
    "Authorization": "your-token"
}
```

Response example:

```javascript
{
    {
        "message": "USER_LOGGED_OUT"
    }
}
```

### Register

Endpoint:

```
{{site_link}}/api/register
```

Method:

```
POST
```

Request body:

```javascript
{
    "name": "name",
    "email":"email@some.com",
    "password": "asecret",
    "confirm_password": "asecret"
}
```

Response example:

```javascript
{
    "message": "USER_CREATED",
    "data": {
        "name": "name",
        "email": "email@some.com",
        "updated_at": "2023-01-30T22:30:09.000000Z",
        "created_at": "2023-01-30T22:30:09.000000Z",
        "id": id
    }
}
```

## Fronted

```

```
