'use strict';

const express = require('express');
const SprintsRoute = require('../controllers/sprints.controller.js');

const router = express.Router();

router.post('/', SprintsRoute.create);

router.get('/:idsprints', SprintsRoute.findById);

router.put('/', SprintsRoute.update);

router.delete('/:idsprints', SprintsRoute.delete);

module.exports = router;