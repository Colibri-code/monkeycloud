'use strict';

const Company = require('../models/company.js');

exports.create = function(req, res){
    
    const sentCompany = new Company(req.body);
    
    if(req.body.constructor === Object && Object.keys(req.body).length === 0)
    {
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required fields' });
    } else {
            Company.create(sentCompany, function(err, sendCompany){
                if(err){
                 return res.send(err);
            } else {
             return res.json({error:false, message: 'Added company succesfully!', data: sendCompany});
        }
    });
} 

}

exports.findById = function(req, res) {   
Company.findById(req.params.idcompany, function (err, company) {
        if(err){
             res.send(err);
        }else{
            res.json(company);
        }
    })
};

exports.update = function(req, res){

    if(req.body.constructor === Object && Object.keys(req.body).length === 0) {
        return res.sendStatus(400).send({ error:true, message: 'Please provide all required field' });
    }else{
        Company.update(req.body, function(err, companyToUpdate) {
                if(err){
                    res.send(err);
                } else {
                    res.json({ errror:false, message: 'Company updated!', data: companyToUpdate});
                }
        
        })
    }
};