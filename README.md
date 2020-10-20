# monkeycloud

Task Manager and Git Workflow

## Docker Local Buils
Need to install docker and docker compose [Installation Guide](https://docs.docker.com/compose/install/)

 * Build container image: `docker-compose up -d`
 
 
 ## Error Bind for 0.0.0.0:8080 failed: port is already allocated
 
 Fixed with https://github.com/docker/compose/issues/4950#issuecomment-398879461

## setup

Install locally MySql https://dev.mysql.com/downloads/mysql/

Install node: https://nodejs.org/en/download/

Setup a database with the name you desire either through a shell or in mysql workbench.

inside of /config/datastores.js change url to your current settings.

After this is done run npm install, and then run npm run start.

## how does the api work
Check the files in models to find out how the database is setup if you want to see how the input to the endpoints is handled look
controllers folder, both of this folders are located inside the api folder.

to check the end points of the specific controller check the corresponding action on the routes file found on the config folder
in the root folder of the app.

## links
Here are some links that might be helpful
https://sailsjs.com/documentation/concepts/actions-and-controllers
https://sailsjs.com/documentation/concepts/models-and-orm/attributes
https://sailsjs.com/documentation/concepts/models-and-orm/associations

if you encounter the client does not support authentication error check this link 
https://stackoverflow.com/questions/50093144/mysql-8-0-client-does-not-support-authentication-protocol-requested-by-server

## to do
Access control this is handled through policies file inside the config folder. 
