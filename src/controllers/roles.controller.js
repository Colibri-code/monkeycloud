
'use strict';

const Roles = require('../models/roles.js');


exports.create = function(req, res) {

    const convertrol = new Roles(req.body);

    if(req.body.constructor === Object && Object.keys(req.body).length === 0){
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required field' });
    }else{
    Roles.create(convertrol, function(err, convertrol){
        if(err){
            return res.send(err);
        }
        return res.json({error:false, message: 'Added rol succesfully!', data: convertrol});
    });
    }

};


exports.findById = function(req, res){
    Roles.findById(req.params.idrol, function (err, rol) {
        if(err){
             res.send(err);
        }else{
          res.json(rol);
        }
    });
};