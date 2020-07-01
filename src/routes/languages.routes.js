'use strict';

const express = require('express');
const LanguageRoute = require('../controllers/language.controller.js');
const Languages = require('../models/languages.js');

const router = express.Router();

router.post('/', LanguageRoute.create);

router.get('/:idlanguage', LanguageRoute.findById);

router.put('/', LanguageRoute.update);

router.delete('/:idlanguage', LanguageRoute.delete);


module.exports = router;
    
