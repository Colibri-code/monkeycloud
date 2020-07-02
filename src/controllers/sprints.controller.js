'use strict';

const sprint = require('../models/sprints.js');

exports.create = function(req, res) {

    const convertsprint = new sprint(req.body);

    if(req.body.constructor === Object && Object.keys(req.body).length === 0){
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required field' });
    }else{
    sprint.create(convertsprint, function(err, convertsprint){
        if(err){
            return res.send(err);
        }
        return res.json({error:false, message: 'Added sprint succesfully!', data: convertsprint});
    });
    }

};



