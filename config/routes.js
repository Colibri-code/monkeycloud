/**
 * Route Mappings
 * (sails.config.routes)
 *
 * Your routes tell Sails what to do each time it receives a request.
 *
 * For more information on configuring custom routes, check out:
 * https://sailsjs.com/anatomy/config/routes-js
 */

module.exports.routes = {

  /***************************************************************************
  *                                                                          *
  * Make the view located at `views/homepage.ejs` your home page.            *
  *                                                                          *
  * (Alternatively, remove this and add an `index.html` file in your         *
  * `assets` directory)                                                      *
  *                                                                          *
  ***************************************************************************/

  'post /user':  { action: 'create'}, 
  'get /user/:id': { action: 'read'},
  'patch /user/:id': {action: 'update'},
  'delete /user/:id:': {action: 'destroy'},
  'put /user/:id/taskscreated/:fk': {action: 'add'},
  'get /user/:id/taskscreated':{action: 'populate'},
  'delete /user/:id/taskscreated/:fk':{action: 'remove'},
  'put /user/:id/workinfo/:fk': {action: 'add'},
  'get /user/:id/workinfo':{action: 'populate'},
  'delete /user/:id/taskstaken/:fk':{action: 'remove'},
  'put /user/:id/taskstaken/:fk': {action: 'add'},
  'get /user/:id/taskstaken':{action: 'populate'},
  'delete /user/:id/taskstaken/:fk':{action: 'remove'},



  'post /workinfo':  { action: 'create'}, 
  'get /workinfo/:id': { action: 'read'},
  'patch /workinfo/:id': {action: 'update'},
  'delete /workinfo/:id': {action: 'destroy'},

  'post /projects':  { action: 'create'}, 
  'get /projects/:id': { action: 'read'},
  'patch /projects/:id': {action: 'update'},
  'delete /projects/:id:': {action: 'destroy'},

  'post /tasks':  { action: 'create'}, 
  'get /tasks/:id': { action: 'read'},
  'patch /tasks/:id': {action: 'update'},
  'delete /tasks/:id': {action: 'destroy'},

  'post /sprints':  { action: 'create'}, 
  'get /sprints/:id': { action: 'read'},
  'patch /sprints/:id': {action: 'update'},
  'delete /sprints/:id': {action: 'destroy'},

  'post /languages':  { action: 'create'}, 
  'get /languages/:id': { action: 'read'},
  'patch /languages/:id': {action: 'update'},
  'delete /languages/:i:': {action: 'destroy'},

  'post /languages':  { action: 'create'}, 
  'get /languages/:id': { action: 'read'},
  'patch /languages/:id': {action: 'update'},
  'delete /languages/:id': {action: 'destroy'},


  '/': { view: 'pages/homepage' },


  /***************************************************************************
  *                                                                          *
  * More custom routes here...                                               *
  * (See https://sailsjs.com/config/routes for examples.)                    *
  *                                                                          *
  * If a request to a URL doesn't match any of the routes in this file, it   *
  * is matched against "shadow routes" (e.g. blueprint routes).  If it does  *
  * not match any of those, it is matched against static assets.             *
  *                                                                          *
  ***************************************************************************/


};
