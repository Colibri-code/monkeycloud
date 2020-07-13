# monkeycloud

a [Sails v1](https://sailsjs.com) application

# database model explanation
The model of the database for this application is the following, the user table has a relationship with a unique work info which sets out the work info of a particular user, to build or modify info from this table you need to look at values of the specific company table which u can either find by id in company table. 
Once this is setup you can setup projects from the company table this is done in order to organize projects as belonging to a particular company, from projects you can set out sprints which relate to those projects and from those sprints tasks which relate to that specific sprint. In those sprints you will find an attribute with the name collections, this are the specific instances that waterline object relational mapper uses to place out the relationships in the database check https://sailsjs.com/documentation/concepts/models-and-orm/associations  for more details, tasks has 3 collections that handle 3 different records user that takes a task, user that makes a task and tasks related to the current task. If one task has value null in tasks related this means this task is the final task in the line, task don’t need to have just one user assigned they could have multiple users assigned.
It is recommended to see the link shown above to get a clear understanding of how relationships work in the waterline ORM and how to implement tables in the future.

#first time setup
To run the application in your environment create a database through a MySQL shell, open MySQL through a terminal and type create thedatabasenameyouprovide, then go to datastores in config datastores.js and modify the URL of the default datastore to match your settings.
Run npm install then run npm run start
Migrations handling is done through model.js in the same folder in wich you find datastores.js, from them you can change the settings of migrations by default this is set to alter for developing purposes but you can change them as you see fit, for more details read https://sailsjs.com/documentation/reference/configuration/sails-config-datastores 
If your having trouble authenticating check this post https://stackoverflow.com/questions/50093144/mysql-8-0-client-does-not-support-authentication-protocol-requested-by-server




### Links

+ [Sails framework documentation](https://sailsjs.com/get-started)
+ [Version notes / upgrading](https://sailsjs.com/documentation/upgrading)
+ [Deployment tips](https://sailsjs.com/documentation/concepts/deployment)
+ [Community support options](https://sailsjs.com/support)
+ [Professional / enterprise options](https://sailsjs.com/enterprise)


### Version info

This app was originally generated on Sun Jul 05 2020 22:36:21 GMT-0600 (GMT-06:00) using Sails v1.2.4.

<!-- Internally, Sails used [`sails-generate@1.17.2`](https://github.com/balderdashy/sails-generate/tree/v1.17.2/lib/core-generators/new). -->



<!--
Note:  Generators are usually run using the globally-installed `sails` CLI (command-line interface).  This CLI version is _environment-specific_ rather than app-specific, thus over time, as a project's dependencies are upgraded or the project is worked on by different developers on different computers using different versions of Node.js, the Sails dependency in its package.json file may differ from the globally-installed Sails CLI release it was originally generated with.  (Be sure to always check out the relevant [upgrading guides](https://sailsjs.com/upgrading) before upgrading the version of Sails used by your app.  If you're stuck, [get help here](https://sailsjs.com/support).)
-->

