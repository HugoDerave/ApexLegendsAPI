# Match history API
This API is only available to our Supporters for now. For more information, check out our discord @ https://discord.gg/6D59VkE

# Query structure
Like any other request, you must have an API key. 

An example query would be: 

    GET https://api.mozambiquehe.re/bridge?player=heyimlifeline&platform=PC&auth=YOURAPIKEY&history=1&action=info

The "history" parameter must be set to 1 to access the match history API. Data returned differs according to the "action" parameter

## info
The action=info parameter will return the players you're currently tracking. Please note you're curently limited to 20 registered users at the same time.

    {
        "registered": 2,
        "data": [
            {
                "name": "mrc9h13n",
                "platform": "PC"
            },
            {
                "name": "heyimlifeline",
                "platform": "PC"
            }
        ]
    }


## get
This parameter will return ALL tracked events for the player given in the player and platform parameter. An example response would be

    [
        {
            "uid": "1000575543540",
            "player": "HeyImLIFELINE",
            "timestamp": "1575905943",
            "eventType": "Game",
            "xpProgress": "180",
            "gameLength": "3",
            "legendPlayed": "Lifeline",
            "event": [
                {
                    "value": 95,
                    "key": "damage",
                    "name": "Damage"
                },
                {
                    "value": 1,
                    "key": "games_played",
                    "name": "Games played"
                }
            ]
        },
        {
            "uid": "1000575543540",
            "player": "HeyImLIFELINE",
            "timestamp": "1575905943",
            "eventType": "Session",
            "event": {
                "action": "leave",
                "sessionDuration": "9"
            }
        },
        {
            "uid": "1000575543540",
            "player": "HeyImLIFELINE",
            "timestamp": "1575905673",
            "eventType": "Level",
            "event": {
                "newLevel": "89"
            }
        },
        {
            "uid": "1000575543540",
            "player": "HeyImLIFELINE",
            "timestamp": "1575905673",
            "eventType": "Game",
            "xpProgress": "16740",
            "gameLength": "4",
            "legendPlayed": "Lifeline",
            "event": [
                {
                    "value": 1,
                    "key": "games_played",
                    "name": "Games played"
                }
            ]
        },
        {
            "uid": "1000575543540",
            "player": "HeyImLIFELINE",
            "timestamp": "1575905403",
            "eventType": "Level",
            "event": {
                "newLevel": "88"
            }
        },
        {
            "uid": "1000575543540",
            "player": "HeyImLIFELINE",
            "timestamp": "1575905403",
            "eventType": "Game",
            "xpProgress": "0",
            "gameLength": "-1",
            "legendPlayed": "",
            "event": [
                {
                    "value": 0,
                    "key": null,
                    "name": null
                }
            ]
        },
        {
            "uid": "1000575543540",
            "player": "HeyImLIFELINE",
            "timestamp": "1575905403",
            "eventType": "Session",
            "event": {
                "action": "join"
            }
        }
    ]
There are 4 events tracked:
Login, leave, level up and game played.

**Session login** will return his timestamp and the join action, as shown above.
**Sesion leave** will return timestamp and game session duration in minutes.
**Level up** will return timestamp and the new player level.
**Game** will return the data from the player's trackers shown on his profile (max 3), the legend he was using, timestamp, XP progress (approx.) and the game duration. 

## delete
Removes the given user from the tracked users list. Will return your current registered users.

## add
Add the given player to your current registered users. Max 20 for now.

More data will be added in the upcoming days, give your suggestion on discord :)
