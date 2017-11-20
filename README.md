# Warning: Work in process

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
 _The nice thing about starting with a Lumen project is that if your project grows, you can upgrade to Laravel very easily. In Laravel there are ways to better deal with large data sets such as [chunking the results](https://laravel.com/docs/master/queries#chunking-results) into smaller subsets of data and working with one chunk at a time.
 This makes for a very scalable project._


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
 
Navigate to folder where you want to install project 

```git clone https://github.com/webdeva4/lpi-challenge.git```

Download [composer](https://getcomposer.org/download), if you don’t have it

Add ```~/.composer/vendor/bin``` to $PATH if not already there

Install Lumen using composer:

```composer global require "laravel/lumen-installer"```

```composer install```

```composer dump-autoload```

Install [sqlite](https://www.sqlite.org/download.html), if needed

Create database:

```touch database/database.sqlite```

Navigate to public folder

Copy example.env to .env

start server from public folder:

Navigate to public folder

```php -S localhost:8080 -t public/``` in one terminal window

open another terminal window and navigate to the project folder - lpi-challenge/public

```php artisan migrate```

```php artisan db:seed```


I used Postman for my testing.

### Testing Data
**Users**
user_id, name
1       Eric
2       Terry
3       Dee
4       Mike
5       Chip
6       Kavita
7       Laurie

**Cities**

user_id,  city,         state

1          Milwaukee     WI

2          New Berlin    WI

3          Hartford      WI

4          Madison       WI

5          San Diego     CA

6          San Francisco CA

7          Oakland       CA

8          Portland      OR

9          Eugene        OR

10         Phoenix       AZ

11         Sedona        AZ

12         Tucsan        AZ

13         Arlington     IL

14         Chicago       IL

15         Naperville    IL


**Visits**

visit_id, user_id, city_id

1           1          1

2           1          2

3           1          3

4           2          4

5           2          5

6           3          6

7           3          7

10          4          10

11          5          11

12          5          12

13          5          13

14          6          14

15          6          15

16          6          1

17          7          2

18          7          3

19          7          4

20          7          5

