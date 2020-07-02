'use strict';

const express = require('express');
const RolesRoute = require('../controllers/rol.controller.js');
const router = express.Router();

router.post('/', RolesRoute.create);

router.get('/:idrol', RolesRoute.findById);

router.put('/', RolesRoute.update);

router.delete('/:idrol', RolesRoute.delete);

module.exports = router;
    
