'use strict';

const sql = require('../connectionToDB.js');

const Languages = function(argument)
{
    this.language = argument.language;
};

Languages.create = (newLanguage, result) => {

        sql.query('INSERT INTO `monkeysclouddb`.`languages` SET ?', newLanguage, (res, err) => {
            if(err) {
                console.log('error', err);
                result(err, null);
                return;
        }else{
            console.log(res.insertId);
            result(null, res.insertId);
        } 
 
        });
    
    };

Languages.findById =  function(idlanguage, result) {
    sql.query('SELECT * FROM `monkeysclouddb`.`languages` WHERE ?', idlanguage, (err, res) => {
        if(err) {
            console.log('error:', err);
            result(err, null);
            return;
        }else{
           console.log(null, res);
             return result(res[0]);
        }
    });
};


module.exports = Languages;