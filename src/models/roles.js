'use strict';
const sql = require('../connectionToDB.js');

const roles = function(argument){
    this.rol = argument.rol;
};


roles.create = (newRol, result) => {
    sql.query('INSERT INTO `monkeysclouddb`.`roles` SET ?', newRol, (res, err) => {
        if(err){
            result(err, null);
        } else {
            console.log(res.inserId);
            result(null, res.inserId);
            return;
        }
    });

}

roles.findById = (idrol, result) => {
    sql.query('SELECT * FROM `monkeysclouddb`.`roles` where `idrol` = ?', idrol, (res, err) => {
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



module.exports = roles;