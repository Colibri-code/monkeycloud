'use strict';
const express = require('express');

const router = express.Router();

const companyRoutes = require('../controllers/company.controller.js');


router.post('/', companyRoutes.create);

router.get('/:idcompany', companyRoutes.findById);

router.put('/', companyRoutes.update);

module.exports = router;