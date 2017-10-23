# Simple Rest API
This project implement a fully functionnal PHP REST API.
Its is intended to be highly modular so you can add your own request and data sources.

The "plugins" folder contains all the API commands and their queries, you can easily build new commands, modify existing ones or adding new parameters without redesigning the core.

The "objects" folder is the API command abstraction represented as simple class, its purpose is to link command to a persistent model (this is not mandatory for adding a new command).

The "tools" folder contains various utilities, feel free to add your own handy functions ! There is also a "Connectors" folder that contains data persistent abstraction, this can be a MYSQL connector (only one available at the time), a XML source or whatever please you.

@TODO List :
- Only simple queries can be performed with the MySQL Connector, to perform complex queries (join for example) the Persistent layer should be redesigned.
- Everything is GET request, we should manage POSTi, PUT and DELETE requests
- Better class loading
- Introspection on objects members to avoid duplicating code
