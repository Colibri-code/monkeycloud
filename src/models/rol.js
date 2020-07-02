'use strict';
const sql = require('../connectionToDB.js');

const roles = function(argument){
    this.rol = argument.rol;
};


roles.create = (newRol, result) => {
    sql.query('INSERT INTO `monkeysclouddb`.`roles` SET ?', newRol, (err, res) => {
        if(err){
            result(err, null);
        } else {
            console.log(res.insertId);
            result(null, res.insertId);
            return;
        }
    });

};

roles.findById = (idrol, result) => {
    sql.query('SELECT * FROM `monkeysclouddb`.`roles` where `idrol` = ?', idrol, (err, res) => {
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


roles.update = function(idrol, result){
    sql.query('UPDATE `monkeysclouddb`.`roles` SET `monkeysclouddb`.`roles`.`rol`= ?   WHERE `monkeysclouddb`.`roles`.`idrol` = ?', [idrol.rol, idrol.idrol], (err, res) => {
        if(err){
            console.log('error: ', err);
            result(null, err);
            return;
        } else {
            console.log('rol :', res);
            result(null, res);
            return;
        }
    });

}

roles.delete = function(idrol, result){
    sql.query('DELETE FROM `monkeysclouddb`.`roles` WHERE `idrol` = ?', idrol, (res, err) => {
        if(err){
            result(null, err);
            return; 
        } else {
            result(null, res);
            return;
        }
    })
}

module.exports = roles;