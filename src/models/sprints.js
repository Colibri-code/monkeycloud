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

module.exports = sprints;