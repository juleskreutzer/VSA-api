#VSA-API
---
###Introduction
This API can be used to modify contents of a database used for the game ```Hack Attack```.

This database can be used for:
 - Get specific player stats
 - Get top scores
 - Get game news
 - Get information about the available modules (defense, base)
 - Get information about the available spells
 - Get information about the available minions

---
### Index
 - [Introduction](https://github.com/juleskreutzer/VSA-api/blob/master/readme.md#introduction)
 - [Version](https://github/com/juleskreutzer/VSA-api/blob/master/readme.md#version)
 - [Endpoints](https://github.com/juleskreutzer/VSA-api/blob/master/readme.md#endpoints)
 - [Future Request](https://github.com/juleskreutzer/VSA-api/blob/master/readme.md#future-request)

 
###Version
This API will be in development during PTS3. It is possible that the API will change after the october 16 deadline.

###Endpoints
This API has several endpoints that can be used. All endpoints are described here including the HTTP method that the endpoint accepts.

#####```[GET]```/module
- Get all data about modules that can be placed in the game

#####```[GET]```/module/money
- Get all data about the modules that have the ```money``` class and can be placed in the game

#####```[GET]```/module/base
- Get all data about the modules that have the ```base``` class and can be placed in the game

#####```[GET]```/module/defense
- Get all data about the modules that have the ```defense``` class and can be placed in the game

#####```[GET]```/about
- Get information about the API

#####```[GET]```/highscore
- Get the highscores from the game, default is ```50```

#####```[GET]```/highscore/{10}
- Get the highscores from the top ```[10]``` players

#####```[GET]```/minion
- Get the data used for the minions used in different waves in the game

#####```[GET]```/spell
- Get the data about the spells that can be used in the game

#####```[POST]```/login/{username}/{password}
- Get the current score and displayName from the user registered with the giver username and password

#####```[POST]```/register/{username}/{password}/{displayname}/{email}
- Create a new user account with the given username, password, displayname and email

#####```[POST]```/updateScore/{userID}/{score}
- Update the score for the given userID


---

###Feature request
Need more features for the API? Email me at [juleskreutzer@me.com](mailto:juleskreutzer@me.com)


---
current version: 0.1
current version is available at [nujules](http://api.nujules.nl)
