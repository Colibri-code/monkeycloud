'use strict';

const Languages = require('../models/languages.js');

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