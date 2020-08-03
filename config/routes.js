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

    'POST /user/create': 'UserController.create',
    'GET /user/read/:id': 'UserController.read',
    'PATCH /user/update': 'UserController.update',
    'DELETE /user/delete/:id': 'UserController.delete',


    'POST /languages/create': 'LanguagesController.create',
    'GET /languages/read': 'LanguagesController.read',
    'PATCH /languages/update': 'LanguagesController.update',
    'DELETE /languages/delete/:id': 'LanguagesController.delete',
};