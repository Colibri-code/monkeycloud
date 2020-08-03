# monkeycloud

Agile board workflow with git integration.

## setup

Check datastores and change the adapter options to your current setup (specifically the settings corresponding to your database setup),
dont forget that the datbase thats referenced on datastores must be created before you initiate the app so it is recommended to do this
in a mysql shell.

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

## to do
Access control this is handled through policies file inside the config folder. 