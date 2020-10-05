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
    'POST /user/login': 'UserController.login',
    'POST /user/googlelogin': 'UserController.googleLogin',
    'GET /user/read/:id': 'UserController.read',
    'PATCH /user/update': 'UserController.update',
    'DELETE /user/delete': 'UserController.delete',


    'POST /languages/create': 'LanguagesController.create',
    'GET /languages/read': 'LanguagesController.read',
    'PATCH /languages/update': 'LanguagesController.update',
    'DELETE /languages/delete/:id': 'LanguagesController.delete',


    'POST /company/create': 'CompanyController.create',
    'GET /company/read/:id': 'CompanyController.read',
    'PATCH /company/update': 'CompanyController.update',
    'DELETE /company/delete/:id': 'CompanyController.delete',


    'POST /workinfo/create': 'WorkinfoController.create',
    'GET /workinfo/read/:id': 'WorkinfoController.read',
    'PATCH /workinfo/update': 'WorkinfoController.update',
    'DELETE /workinfo/delete/:id': 'WorkinfoController.delete',


    'POST /projects/create': 'ProjectsController.create',
    'GET /projects/read/:id': 'ProjectsController.read',
    'PATCH /projects/update': 'ProjectsController.update',
    'DELETE /projects/delete/:id': 'ProjectsController.delete',


    'POST /sprints/create': 'SprintsController.create',
    'GET /sprints/read/:id': 'SprintsController.read',
    'PATCH /sprints/update': 'SprintsController.update',
    'DELETE /sprints/delete/:id': 'SprintsController.delete',


    'POST /tasks/create': 'TasksController.create',
    'GET /tasks/read/:id': 'TasksController.read',
    'PATCH /tasks/update': 'TasksController.update',
    'DELETE /tasks/delete/:id': 'TasksController.delete',


};