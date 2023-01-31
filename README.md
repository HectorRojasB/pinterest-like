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

Use [this](https://drive.google.com/file/d/1IU8WMydmby94jDfM10ZBa2tyzMaGHfOz/view?usp=sharing) postman collection.
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

### Users

---

### Get

Endpoint:

```
{{site_link}}/api/user
```

Method:

```
GET
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
    "data": {
        "id": id,
        "email": "email@some.com",
        "role": "admin" || null
    }
}
```

### Posts

---

### Get

Endpoint:

```
{{site_link}}/api/posts/
```

Method:

```
GET
```

Query params:

```javascript
perPage = integer;
```

if not present, default value will be

```javascript
20;
```

Response example:

```javascript
{
    "data": [
        {
            "id": id,
            "title": "title",
            "description": "description",
            "image_url": image_url,
            "likes": likes,
            "is_logged_user_favorite": false
        },
    ]
        "meta": {
        "pagination": {
            "total": totalPosts,
            "count": postOnPage,
            "per_page": postPerPage,
            "current_page": currentPage,
            "total_pages": total_likes,
            "links": {
                "next": url
            }
        }
    }
}
```

### Get By User

Endpoint:

```
{{site_link}}/api/users/{userId}/posts
```

Method:

```
GET
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
    "data": [
        {
            "id": id,
            "title": "title",
            "description": "description",
            "image_url": image_url,
            "likes": likes,
            "is_logged_user_favorite": false
        },
    ]
        "meta": {
        "pagination": {
            "total": totalPosts,
            "count": postOnPage,
            "per_page": postPerPage,
            "current_page": currentPage,
            "total_pages": total_likes,
            "links": {
                "next": url
            }
        }
    }
}
```

### Create

Endpoint:

```
{{site_link}}/api/posts
```

Method:

```
POST
```

Request headers:

```javascript
{
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Authorization": "your-token"
}
```

Request body:

```javascript
{
    "image": file,
    "title": title,
    "description": description
}
```

Response example:

```javascript
{
    "message": "POST_CREATED",
    "data": {
        "image_url": image_url,
        "title": "title",
        "description": "description",
        "user_id": user_id || null ,
        "authorized_by_user_id": user_id || null ,
        "authorized_date": timestamp || null ,
        "updated_at": timestamp,
        "created_at": timestamp,
        "id": id
    }
}
```

### Get Unauthorized

Endpoint:

```
{{site_link}}/api/unauthorized/posts
```

Method:

```
GET
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
    "data": [
        {
            "id": id,
            "title": "title",
            "description": "description",
            "image_url": image_url,
            "likes": likes,
            "is_logged_user_favorite": false
        },
    ]
        "meta": {
        "pagination": {
            "total": totalPosts,
            "count": postOnPage,
            "per_page": postPerPage,
            "current_page": currentPage,
            "total_pages": total_likes,
            "links": {
                "next": url
            }
        }
    }
}
```

### Authorize post

Endpoint:

```
{{site_link}}/api/authorize/posts/{postId}
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
    "message": "POST_AUTHORIZED",
    "data": {
        "id": id,
        "image_url": image_url,
        "authorized_by_user_id": id,
        "authorized_date": timestamp,
        "title": title,
        "description": description,
        "user_id": user_id,
        "created_at": timestamp,
        "updated_at": timestamp
    }
}
```

### Favorites

## Get

Endpoint:

```
{{site_link}}/api/favorites
```

Method:

```
GET
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
    "data": [
        {
            "id": id,
            "title": "title",
            "description": "description",
            "image_url": image_url,
            "likes": likes,
            "is_logged_user_favorite": false
        },
    ]
        "meta": {
        "pagination": {
            "total": totalPosts,
            "count": postOnPage,
            "per_page": postPerPage,
            "current_page": currentPage,
            "total_pages": total_likes,
            "links": {
                "next": url
            }
        }
    }
}
```

## Add

Endpoint:

```
{{site_link}}/api/favorites/add/{postId}
```

Method:

```
GET
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
    "message": "POST_ADDED_TO_FAVORITES",
    "data": null
}
```

## Remove

Endpoint:

```
{{site_link}}/api/favorites/remove/{postId}
```

Method:

```
GET
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
    "message": "POST_REMOVIED_FROM_FAVORITES",
    "data": null
}
```

---

## Fronted

```

```
