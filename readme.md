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

#####```[GET]```/highscore/[10]
- Get the highscores from the top ```[10]``` players

#####```[GET]```/minion
- Get the data used for the minions used in different waves in the game

#####```[GET]```/spell
- Get the data about the spells that can be used in the game

---

###Future request
Need more future's for the API? Email me at [juleskreutzer@me.com](mailto:juleskreutzer@me.com)


---
current version: 1.0
current version is available at [nujules](http://api.nujules.nl)


