'use strict';

const express = require('express');
const RolesRoute = require('../controllers/roles.controller.js');

const router = express.Router();

router.post('/', RolesRoute.create);

router.get('/:idrol', RolesRoute.findById);

module.exports = router;
    
