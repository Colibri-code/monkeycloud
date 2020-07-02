'use strict';

const sql = require('../connectionToDB.js');

const Company = function(argument) {
        this.name = argument.name;
        this.teams = argument.teams;
        this.departments = argument.departments;
    };
     
Company.create = (newCompany, result) => {
    sql.query('INSERT INTO `monkeysclouddb`.`company` SET ?', newCompany, function(res, err) {
            if (err) {
                console.log('error:', err);
                result(err, null);
                return;
            } else {
                console.log(res.insertId);
                result(null, res.insertId);
            }

        });

    };



module.exports = Company;