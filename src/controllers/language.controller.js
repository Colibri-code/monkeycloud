const Languages = require('../models/languages.js');

exports.create = (req, res) => {

    if(!req.body){
        res.status(400).send({
            message: 'empty!'
        })
    }

    const convertlanguage = new Languages({
        language: req.body.language
    });

    Languages.create(convertlanguage, (err, data) => {
        if(err)
            res.status(500).send({
                message:
                    err.message || 'some error'
        });
        else res.send(data);
    });

};