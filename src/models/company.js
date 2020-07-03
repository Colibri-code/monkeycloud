'use strict';

const sql = require('../connectionToDB.js');
const e = require('express');

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
Company.findById = function(idCompany, result) {
    sql.query('SELECT * FROM `monkeysclouddb`.`company` WHERE `idcompany` = ?', idCompany, function(res, err) {
        if (err){
            console.log('eror:', err);
            result(null, err);
            return;
        } else {
            result(null, res[0]);
            return;
        }
    })
}

Company.update = function(idCompany, result) {
    sql.query('UPDATE `monkeysclouddb`.`company` SET `monkeysclouddb`.`company`.`name` = ?, `monkeysclouddb`.`company`.`teams` = ?, `monkeysclouddb`.`company`.`departments` = ? WHERE `monkeysclouddb`.`company`.`idcompany` = ?', [idCompany.name, JSON.stringify(idCompany.teams) , JSON.stringify(idCompany.departments), idCompany.idcompany], function(res, err){
        if(err){
            result(null, err);
            return;
        } else {
            console.log('Companies :', res);
            result(null, res);
            return;
        }    
    })
}



module.exports = Company;