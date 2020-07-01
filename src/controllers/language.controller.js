'use strict';

const Languages = require('../models/languages.js');
const { json } = require('body-parser');
const e = require('express');

exports.create = function(req, res) {

    const convertlanguage = new Languages(req.body);

    if(req.body.constructor === Object && Object.keys(req.body).length === 0){
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required field' });
    }else{
    Languages.create(convertlanguage, function(err, convertlanguage){
        if(err){
            return res.send(err);
        }
        return res.json({error:false, message: 'Added language succesfully!', data: convertlanguage});
    });
    }

};

exports.findById = function(req, res){
    Languages.findById(req.params.idlanguage, function (err, language) {
        if(err){
             res.send(err);
        }
          res.json(language);
    });
};


exports.update = function(req, res) {
    if(req.body.constructor === Object && Object.keys(req.body).length === 0){
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required field' });
    } else {
        Languages.update(req.body.idlanguage ,new Languages(req.body.language), function(err, updatedlanguage){
            if(err){
                res.send(err);
                return;
            }else{

                res.json({ errror:false, message: 'language updated!', data: updatedlanguage});
                return;
            }
            });        
    }
};