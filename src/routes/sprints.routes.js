'use strict';

const express = require('express');
const SprintsRoute = require('../controllers/sprints.controller.js');

const router = express.Router();

router.post('/', SprintsRoute.create);

module.exports = router;