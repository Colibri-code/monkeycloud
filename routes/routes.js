const express = require('express');
const routes = express.Router();
const status = require("../tests/open");

module.exports =  routes.get("/", (req, res) => {
    res.send(status)
    }
);


