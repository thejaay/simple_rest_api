# Simple Rest API
This project implement a fully functionnal PHP REST API.
Its is intended to be highly modular so you can add your own request and data sources.

## plugins
It contains all the API commands and their queries, you can easily build new commands, modify existing ones or adding new parameters without redesigning the core.

## Connectors
Contains data persistent abstraction, this can be a MYSQL connector (only one available at the time), a XML source or whatever please you.

@TODO List :
- Only simple queries can be performed with the MySQL Connector, to perform complex queries (join for example) the Persistent layer should be redesigned.
- Everything is GET request, we should manage POST, PUT and DELETE requests
- Better class loading
- Introspection on objects members to avoid duplicating code
- Better error codes
- Add function to retrieve query operator (hard coded at the time)
