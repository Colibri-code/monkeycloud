'use strict'
var express = require('express');
const bodyParser = require('body-parser');
var app = express();
const LanguagesRoutes = require('./src/routes/languages.routes.js');
const RolesRoutes = require('./src/routes/roles.routes.js');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use('/table/language', LanguagesRoutes);
app.use('/table/roles', RolesRoutes);




app.get('/', (req, res) => {
    res.send('dev hell')
});



app.listen(3000);