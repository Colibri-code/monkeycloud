'use strict';

const express = require('express');
const LanguageRoute = require('../controllers/language.controller.js');

const router = express.Router();

router.post('/', LanguageRoute.create);

router.get('/:idlanguage', LanguageRoute.findById);


module.exports = router;
    
