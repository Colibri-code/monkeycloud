'use strict';

const mysql = require('mysql');
const dbConfig = require('./config/dbconfig.js');

module.exports = mysql.createPool({
    host: dbConfig.HOST,
    user: dbConfig.USER,
    password: dbConfig.PASSWORD,
    database: dbConfig.DB,
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
});


