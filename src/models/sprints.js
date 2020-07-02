'use strict';

const sql = require('../connectionToDB.js');

const sprints = function(argument){
    this.name = argument.name;
};

sprints.create = function(newSprint, result) {
    sql.query('INSERT INTO `monkeysclouddb`.`sprints` SET ?', newSprint, (err, res) => {
            if (err) {
                result(err, null);
                return;
            } else {
                console.log(res.insertId);
                result(null, res.insertId);
                return;
            }
        });

};

sprints.findById = function(idsprint, result){
    sql.query('SELECT * FROM `monkeysclouddb`.`sprints` WHERE `idsprints` = ?', idsprint, (err, res) => {
        if(err){
            result(err, null);
            return;
        } else {
            console.log(res);
            result(null, res[0]);
            return;
        }
    });
}



module.exports = sprints;