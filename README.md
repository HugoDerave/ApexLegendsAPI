**SUPPORT US !** Support us on Patreon to keep this API free. https://www.patreon.com/apexlegendsstatus - API doc will be moving to mozambiquehe.re in few days.
Please note: We have a strict rate limit for users which aren't registered in our database. Once you make a first request on them and they are succesfully added in our DB, this rate won't apply.

# Apex Legends News API
See news-api.md for info.

# Unofficial Apex Legends Stats API

We're providing a free API without any rate limit, that can be used for any project. However, this may change in the near future according to our finance & server load. Sorry for the average english level, i'm french :-)
Any question? Go to our discord @ [https://discord.gg/TZ4Y9EB](https://discord.gg/TZ4Y9EB "https://discord.gg/TZ4Y9EB").

Please also note that due to current Respawn limitations, the API will only return the banners displayed data in the "current" field. Data displayed in the "all" field comes from previous requests, that are saved.

# Get an API Key

We require every user to get an API Key for "control" reason and stats. To get an API key, go to http://api.mozambiquehe.re/getkey. We'll ask you your project url and short project description. Please note that providing a wrong information will most likely get your key suspended.

## Make a request

To get a player's data, go to http://api.mozambiquehe.re/bridge and add the 3 main GET parameters. First one is platform, which can only take "PC", "PS4" or "X1". The second one will be "player", and that's obvisouly the player's name you're looking for. You can also add "version" parameter, which will give you more flexibility. (Currently we have version 1 and 2).

**Authorization**
To auth yourself, you can either put your API Key as a third GET parameter in the URL which will be "auth", or put your API Key in the "Authorization" header.

Your request should look like this (if you're using your API Key in the URL):

**v1**

    GET http://api.mozambiquehe.re/bridge?platform=PC&player=HeyImLifeline&auth=YOURAPIKEY
    
**v2**
    
    GET http://api.mozambiquehe.re/bridge?version=2&platform=PC&player=HeyImLifeline&auth=YOURAPIKEY
    
    
**Multi player search (all players must be on the same platform !, working for both API versions)**
    
    GET http://api.mozambiquehe.re/bridge?version=2&platform=PC&player=PlayerA,PlayerB,PlayerC&auth=YOURAPIKEY
    
**Search by UID (working in both single or multi query, same syntax as above, given example if for multi)**
    
    GET http://api.mozambiquehe.re/bridge?platform=PC&uid=UID1,UID2&auth=YOURAPIKEY
    
    
Where PC is the platform and HeyImLifeline the user's name. The API will convert the username to his UID by itself, so don't use his UID as GET parameter :-)

# API Response
If the API returns with a httpcode other than 200, there was an error while processing the data. You should get the error message in response.

If code 200 is returned, you'll find the following JSON content (THIS IS FOR V1. SEE V2.JSON IF YOU'RE USING V2):

    {"global":{"name":"HeyImLIFELINE","uid":1000575543540,"platform":"PC","level":65,"toNextLevelPercent":79,"internalUpdateCount":1189},"realtime":{"lobbyState":"open","isOnline":1,"isInGame":0,"canJoin":1,"selectedLegend":"Mirage"},"legends":{"selected":{"Mirage":{"kills":"13","empty":0}},"all":{"Bangalore":{"kills":"11","creeping_barrage_damage":"180"},"Bloodhound":{"kills":"75","top_3":"12"},"Lifeline":{"kills":"770","damage":"198139","dropped_items_for_squadmates":"202"},"Caustic":{"kills":"4"},"Gibraltar":{"kills":"0"},"Mirage":{"kills":"13"},"Pathfinder":{"kills":"9","pistol_kills":"0","beacons_scanned":"0"},"Wraith":{"kills":"19"}}},"total":{"kills":901,"creeping_barrage_damage":180,"top_3":12,"damage":198139,"dropped_items_for_squadmates":202,"pistol_kills":0,"beacons_scanned":0,"kd":-1}}

The **global** field contains most important data about the user. You'll find his name, his UID, his platform, level, level progress and how many times he updated his character ingame.

The **realtime** field provided current data about the user, such as the selected Legend, his lobbyState (open or invite), if the player is online, if he's in a game and if you can join him (if you can't, he's party is full or his lobbyState is set to 'invite').

The **legends** field contains all data related to legends, split in 2 main data arrays:
   **selected** -> data about currently selected legend.

   **all** -> player's data history, with updated ones and older ones. Each time the player is updated, any new data will be added and if already present, it will be updated.

Finally, you'll get total stats across all legends. The kd field will be -1 unless the API finds a 'kills' field and 'games_played' field.

