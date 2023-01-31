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
8. run 
```
npm run dev
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


## Frontend
---

### Main Page
![Captura de pantalla 2023-01-30 a la(s) 18 29 11](https://user-images.githubusercontent.com/35705713/215631831-f3ade2ab-956d-4481-9a0f-e30530420b0b.png)

This is main page where you can find all posts, click on post to open post detail modal
![Captura de pantalla 2023-01-30 a la(s) 19 01 12](https://user-images.githubusercontent.com/35705713/215632010-4eaa2a33-1716-463d-a30b-bb0cf23397f3.png)


### Register

![Captura de pantalla 2023-01-30 a la(s) 18 43 26](https://user-images.githubusercontent.com/35705713/215631588-85ad3612-9f85-4f3e-9220-6faf05cab0c3.png)

Use form fields to register new user, all data is required, if user is admin use checkbox

### Login
![Captura de pantalla 2023-01-30 a la(s) 18 58 11](https://user-images.githubusercontent.com/35705713/215631504-e1e8f3f9-73ff-400e-9c0c-921f776d65aa.png)

Use email and password if user was been register

if login fails, there will be a modal indicating the error

![Captura de pantalla 2023-01-30 a la(s) 18 43 17](https://user-images.githubusercontent.com/35705713/215632984-20e507b5-1c24-4006-b2aa-254d2a76024c.png)

afer login, home page will show the posts created by the logged user 
![Captura de pantalla 2023-01-30 a la(s) 18 50 07](https://user-images.githubusercontent.com/35705713/215632162-3ccae459-9798-46e1-8289-d27f9da1182d.png)


## Post Creation
To create a new post, go to upload page 
![Captura de pantalla 2023-01-30 a la(s) 18 29 25](https://user-images.githubusercontent.com/35705713/215633110-92c28940-243c-4ef7-943f-9970bba38ce7.png)

after you choose an image, a preview will be shown

![Captura de pantalla 2023-01-30 a la(s) 18 30 14](https://user-images.githubusercontent.com/35705713/215633189-fff6e5e7-5ea1-448f-a13a-71cb71a40d93.png)

You can choose other image by clicking on the reset button

once your post is created, a modal with a message will be displayed 
![Captura de pantalla 2023-01-30 a la(s) 18 32 03](https://user-images.githubusercontent.com/35705713/215633336-f548e158-58e5-4480-85a4-f6cf44bbcab8.png)


## Favorites
Only logged users can add/remove posts from favorites

Click on post, then on add to favorites button

![Captura de pantalla 2023-01-30 a la(s) 18 50 23](https://user-images.githubusercontent.com/35705713/215632468-9341c15b-f932-4893-85c3-b15f8b5ec04d.png)

To remove from favorites, open detail modal and click on remove from favorites button
![Captura de pantalla 2023-01-30 a la(s) 18 50 39](https://user-images.githubusercontent.com/35705713/215632545-4d8e72f9-fed4-4aae-b6dc-a7e093a39333.png)

All user's favorite posts will be displayed on the favorites page


## Discover 

Click on the discover page to get all posts(from other users)

![Captura de pantalla 2023-01-30 a la(s) 18 50 18](https://user-images.githubusercontent.com/35705713/215632713-16968215-2d68-4c13-8c1a-9a8ad6adcd36.png)


## Moderation
(only for admin users
click on moderation page to moderate the userless posts 
![Captura de pantalla 2023-01-30 a la(s) 18 50 12](https://user-images.githubusercontent.com/35705713/215632853-f969b18b-e669-4e38-ba51-fc5de1a9f759.png)
