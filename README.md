# Mirror

![Image](https://github.com/HamishHamiltonSmith/Mirror/blob/main/examples/Screenshot%202022-08-24%2020.56.55.png)

Mirror is a small site where you can remotely access SQL-based databases, with this connection you are able to view and manage the databse from your browser. Make sure you only use this service with https. The site is currently down for maintenence as of August 2022 but usually you can access it with the url: https://mirror-2c43c.web.app/. If the site is down, its code is avaidable in the repository and interpriter-ready or there are some snapshots below.

## Getting started

Mirror is fairly simple. Firstly, log in to your chosen database. If your log-in is successful, you will be taken to a page where you can run SQL querys via the command box, the results of your querys will be displayed below. Basic information about the tables in your database is displayed at the top of the page. 

## Security and workings

First off, Mirror does not record any details/credentials you submit. After login databases credentials are posted to a php server for processing. This is the only point in the process where any risks are involved. Make sure your connection is via https, otherwise if a hacker intercepts the transaction, they may be able to view these credentials unencypted. After this point the server connects to the database. Credentials are stored in php enviroment variables for when they are needed (eg: when a new query is made). Basic info about tables in the database is requested and displayed by the server. When a query is submitted, a diferent php page (command.php) connects again to the database using the stored credentials and makes the query, it then stores the results as an enviroment and redirects back to the main php with a GET request telling it to display the info. That's about it, a quick project.

## Snapshots

![Image](https://github.com/HamishHamiltonSmith/Mirror/blob/main/examples/Screenshot%202022-08-24%2020.59.35.png)
