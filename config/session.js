/**
 * Session Configuration
 * (sails.config.session)
 *
 * Use the settings below to configure session integration in your app.
 * (for additional recommended settings, see `config/env/production.js`)
 *
 * For all available options, see:
 * https://sailsjs.com/config/session
 */

module.exports.session = {

    /***************************************************************************
     *                                                                          *
     * Session secret is automatically generated when your new app is created   *
     * Replace at your own risk in production-- you will invalidate the cookies *
     * of your users, forcing them to log in again.                             *
     *                                                                          *
     ***************************************************************************/
    secret: '41fdaf54f1a422aaa384a3d138859b5f',
    adapter: 'express-mysql-session',
    host: 'localhost',
    port: 3306,
    user: 'josue',
    password: '12345678',
    database: 'monkeycloud',
    ssl: false,
    stringify: true,
    cookie: {
        maxAge: 24 * 60 * 60 * 1000
    },
    

    /***************************************************************************
     *                                                                          *
     * Customize when built-in session support will be skipped.                 *
     *                                                                          *
     * (Useful for performance tuning; particularly to avoid wasting cycles on  *
     * session management when responding to simple requests for static assets, *
     * like images or stylesheets.)                                             *
     *                                                                          *
     * https://sailsjs.com/config/session                                       *
     *                                                                          *
     ***************************************************************************/
    // isSessionDisabled: function (req){
    //   return !!req.path.match(req._sails.LOOKS_LIKE_ASSET_RX);
    // },

};