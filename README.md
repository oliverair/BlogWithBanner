
##  Task
**Requirements:**
- Laravel(^9.0)
- VueJs(^2.6)

1) Model and Relationship

   Create model and relations

    - Post   (id, status, name, text)
    - Card   (id, status, name, text)
    - Banner (id, status, name, text, url)

   Post MorphToMany Banner
   Card MorphToMany Banner
2) Frontend - show Post model

    - create logic prepare posts content(text)
    - rules
      - first banner show after first ```<p>```
      - second banner show before last ```<p>```
    - banner html structure```<div> <a href='url'><p>name</p></a> <p>text</p></div>```
    - show post page
3) Vue js

    - create one admin dashboard interface
    - show list of banners
    - show modal (list of related models)

## Installation
**Environment requirements**
- PHP 8.1.9
- PosgreSQL 14.0
- NodeJS v20.9.0 and npm 10.1.0
- Nginx or Apache

**Steps**

1. Clone repository
2. ```composer install```
3. ```php artisan migrate --seed```
4. ```npm build dev```

## Additional info
- Project could be easily done with Inertia, but i used stand-alone VueJS app, to show API/axios functionality
- Foreign key for Entities - for Morph relation not implemented, but must be
- Admin panel located http://localhost/admin
- Docker is not implemented. 
