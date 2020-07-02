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


exports.findById = function(req, res) {

    sprint.findById(req.params.idsprint, function(err, sprint) {
        if(err){
           return res.send(err);
        }else{
           return res.json(sprint);
        }

    });

}

exports.update = function(req, res) {
    if(req.body.constructor === Object && Object.keys(req.body).length === 0){
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required field' });
    } else {
        sprint.update(req.body, function(err, updatedsprint){
            if(err){
                res.send(err);
                return;
            } else {

                res.json({ errror:false, message: 'sprint updated!', data: updatedsprint});
                return;
            }
            });        
    }
};


