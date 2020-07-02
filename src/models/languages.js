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
            result(null, res);
            return;
        }else{
           console.log(null, res);
             result(res[0]);
            return;
        }
    });
};

Languages.update = function(idlanguage , result){
    console.log(idlanguage.language);
    sql.query('UPDATE `monkeysclouddb`.`languages` SET `monkeysclouddb`.`languages`.`language`=?   WHERE `monkeysclouddb`.`languages`.`idlanguage` = ?', [idlanguage.language, idlanguage.idlanguage], (err, res) => {
        if(err){
            console.log('error: ', err);
            result(null, err);
            return;
        } else {
            console.log('language :', res);
            result(null, res);
            return;
        }
    });

}

Languages.delete = function(idlanguage, result){
    sql.query('DELETE FROM `monkeysclouddb`.`languages` WHERE `idlanguage` = ?', [idlanguage], (err, res) => {
        if(err){
            console.log('error: ', err);
            result(null, err);
            return;
        } else {
            result(null, res);
            return;
        }

    });

}

module.exports = Languages;