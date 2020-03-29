# Documentation has moved


**Now providing a MATCH HISTORY API ! Read more @ https://github.com/HugoDerave/ApexLegendsAPI/blob/master/match_history_API.md**

Please note: We have a strict rate limit for users which aren't registered in our database. Once you make a first request on them and they are succesfully added in our DB, this rate won't apply. From now, we'll apply bans to people trying to overload our API for no reason (using security breach, for example).
With the upcomming Season 2, API may not work for some time / new stats trackers may be missing. They will be added as quick as possible ;)

# Apex Legends News API
See news-api.md for info.

# Unofficial Apex Legends Stats API

We're providing a free API without any rate limit, that can be used for any project. However, this may change in the near future according to our finance & server load. Sorry for the average english level, i'm french :-)
Any question? Go to our discord @ [https://discord.gg/TZ4Y9EB](https://discord.gg/TZ4Y9EB "https://discord.gg/TZ4Y9EB").

Please also note that due to current Respawn limitations, the API will only return the banners displayed data in the "current" field. Data displayed in the "all" field comes from previous requests, that are saved.

# Get an API Key

We require every user to get an API Key for "control" reason and stats. To get an API key, go to https://api.mozambiquehe.re/getkey. We'll ask you your project url and short project description. Please note that providing a wrong information will most likely get your key suspended.

## Make a request

To get a player's data, go to https://api.mozambiquehe.re/bridge and add the 3 main GET parameters. First one is platform, which can only take "PC", "PS4" or "X1". The second one will be "player", and that's obvisouly the player's name you're looking for. You can also add "version" parameter, which will give you more flexibility. (Currently we have version 1 and 2).

**Authorization**
To auth yourself, you can either put your API Key as a third GET parameter in the URL which will be "auth", or put your API Key in the "Authorization" header.

Your request should look like this (if you're using your API Key in the URL):

**v1**

    GET https://api.mozambiquehe.re/bridge?platform=PC&player=HeyImLifeline&auth=YOURAPIKEY
    
**v2**
    
    GET https://api.mozambiquehe.re/bridge?version=2&platform=PC&player=HeyImLifeline&auth=YOURAPIKEY
    
    
**Multi player search (all players must be on the same platform !, working for both API versions)**
    
    GET https://api.mozambiquehe.re/bridge?version=2&platform=PC&player=PlayerA,PlayerB,PlayerC&auth=YOURAPIKEY
    
**Search by UID (working in both single or multi query, same syntax as above, given example if for multi)**
    
    GET https://api.mozambiquehe.re/bridge?platform=PC&uid=UID1,UID2&auth=YOURAPIKEY
    
    
Where PC is the platform and HeyImLifeline the user's name. The API will convert the username to his UID by itself, so don't use his UID as GET parameter :-)

# API Response
If the API returns with a httpcode other than 200, there was an error while processing the data. You should get the error message in response.

If code 200 is returned, you'll find the following JSON content (THIS IS FOR V1. SEE V2.JSON IF YOU'RE USING V2):

    {"global":{"name":"HeyImLIFELINE","uid":1000575543540,"platform":"PC","level":78,"toNextLevelPercent":21,"internalUpdateCount":1900,"rank":{"rankScore":1,"rankName":"Bronze","rankDiv":4},"battlepass":{"level":14},"timeSinceLastRespawnUpdate":-1},"realtime":{"lobbyState":"open","isOnline":0,"isInGame":0,"canJoin":0,"partyFull":0,"selectedLegend":"Lifeline"},"legends":{"selected":{"Lifeline":{"kills":958,"damage":254506,"games_played":449}},"all":{"Bangalore":{"kills":"17","creeping_barrage_damage":"200","wins_season_1":"0","wins_season_2":"0"},"Bloodhound":{"kills":"83","top_3":"12","beast_of_the_hunt_kills":"22","kills_season_1":"8","wins_season_2":"0"},"Lifeline":{"kills":"958","damage":"254506","games_played":"449","dropped_items_for_squadmates":"244","wins_season_2":"0"},"Caustic":{"kills":"4","wins_season_2":"0"},"Gibraltar":{"kills":"0","wins_season_1":"0","wins_season_2":"0"},"Mirage":{"kills":"13","wins_season_2":"0"},"Pathfinder":{"kills":"9","pistol_kills":"0","beacons_scanned":"0","wins_season_1":"0","wins_season_2":"0"},"Wraith":{"kills":"24","wins_season_1":"0","kills_season_1":"5","wins_season_2":"0"},"Octane":{"kills":"3","wins_season_2":"0"},"Wattson":{"wins_season_2":"0"}}},"total":{"kills":1111,"creeping_barrage_damage":200,"wins_season_1":0,"wins_season_2":0,"top_3":12,"beast_of_the_hunt_kills":22,"kills_season_1":13,"damage":254506,"games_played":449,"dropped_items_for_squadmates":244,"pistol_kills":0,"beacons_scanned":0,"kd":-1},"event":{"eliteStreak":0}}

The **global** field contains most important data about the user. You'll find his name, his UID, his platform, level, level progress and how many times he updated his character ingame.

The **realtime** field provided current data about the user, such as the selected Legend, his lobbyState (open or invite), if the player is online, if he's in a game and if you can join him (if you can't, he's party is full or his lobbyState is set to 'invite').

The **legends** field contains all data related to legends, split in 2 main data arrays:
   **selected** -> data about currently selected legend.

   **all** -> player's data history, with updated ones and older ones. Each time the player is updated, any new data will be added and if already present, it will be updated.

Finally, you'll get total stats across all legends. The kd field will be -1 unless the API finds a 'kills' field and 'games_played' field.

