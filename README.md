# **Liturgical Publications Coding Challenge**
## Mission:
You've developed a mobile app that needs to communicate to an API. The API needs to allow users to pin areas they've visited throughout the United Sates. Functionality of the API would include:
 Listing cities in a given state.
 Registering a visit to a city by a user.
 Removing a visit.
 Listing cities visited by a user.
 Listing states visited by a user.


**You may use whatever PHP language, framework, tools, etc. you wish to create the API.**
_I chose to use Lumen which is [The stunningly fast micro-framework by Laravel](https://lumen.laravel.com)
I have not used Lumen before, but it is very close to laravel, minus some of the bells and whistles. I researched a little when I realized i
relied on some of those "bells and whistles". I figured it out.
I chose SQLite for my Database, which I had not worked with before either, but seemed the right choice for the size of this project_

### Required API endpoints:
1. List all cities in a state
       GET /state/{state}/cities
2. Allow creating a new visit to a city.
       POST /user/{user}/visits
{
  "city": "Milwaukee",
  "state": "WI"
}

3. Allow a user to remove a visit.
       DEL /visit/{visit}
4. Return a list of cities the user has visited
       GET /user/{user}/visits
5. Return a list of states the user has visited
       GET /user/{user}/visits/states

_I used [Postman](https://www.getpostman.com) for my testing._


### Things To Keep In Mind
**How should you deal with invalid or improperly formed requests?**
 _I have added checks into the functions to return various HTML status codes, depending on if valid data was entered or not. I made sure that if ids were being entered that they are all numbers otherwise success is not returned._


 **How should you handle requests that result in large data sets?**
 _The nice thing about starting with a Lumen project is that if your project grows, you can upgrade to Laravel very easily. In Laravel there are ways to better deal with large data sets such as [chunking the results](https://laravel.com/docs/master/queries#chunking-results) into smaller subsets of data and working with one chunk at a time._

### Deliverables
 **The source code for your solution.**
 [lpi challenge source](https://github.com/webdeva4/lpi-challenge)
 
 **The database schema you use to implement your solution.**
 _This project's database is comprised of 3 tables
 users table: stores the id of the user, the name of the user
 cities table: stores id of the city, the name of the city, the name of the state
 visits table: stores id of the visit, user_id, and city_id_

 **Installation / implementation instructions for running locally**
 
 **Work done on Mac OS X**
 
Create local folder for project – lpi-challenge, cd lpi-challenge

```git clone https://github.com/webdeva4/lpi-challenge.git```

Download [composer](https://getcomposer.org/download), if you don’t have it

Add ```~/.composer/vendor/bin``` to $PATH if not already there

Install Lumen using composer:

```composer global require "laravel/lumen-installer```

```composer create-project –prefer-dist Laravel/lumen lpi-challenge```

Copy example.env to .env

Install [sqlite](https://www.sqlite.org/download.html):

```sudo apt-get install php7.1-sqlite3```

Create new database:

```touch database/database.sqlite```

create lumen project in lpi-challenge folder:

```lumen new public```

```cd public```

start server:
```php -S localhost:8080 -t public``` in one terminal window

open another terminal window and get to the project folder - lpi-challenge

```php artisan migrate```

```php artisan db:seed```
