'use strict';

const Company = require('../models/company.js');

exports.create = function(req, res) {
    
    const sentCompany = new Company(req.body);
    
    if(req.body.constructor === Object && Object.keys(req.body).length === 0){
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required field' });
    }else{
            Company.create(sentCompany, function(err, sentCompany) {
                if(err){
                 return res.send(err);
            }
             return res.json({error:false, message: 'Added company succesfully!', data: sentCompany});
            }
            );
    


    } 

}