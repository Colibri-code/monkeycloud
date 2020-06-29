const mysql = require('mysql2');
const dbConfig = require('./config/dbconfig.js')

const connection = mysql.createConnection({
    host: dbConfig.HOST,
    user: dbConfig.USER,
    password: dbConfig.PASSWORD,
    database: dbConfig.DB
});

connection.connect(error =>{
    if(error) throw error;
    console.log("Succesfully connected to the database id is: "+ connection.threadId);
});

connection.end();

module.exports = connection;