'use strict';
const express = require('express');

const router = express.Router();

const companyRoutes = require('../controllers/company.controller.js');


router.post('/', companyRoutes.create);

module.exports = router;