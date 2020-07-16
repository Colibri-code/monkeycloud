const e = require('express');
const express = require('express');
const app = express();
const routes = require('./routes/routes.js');

app.get("/", (req, res) => res.send("hello"));
app.use('/test', routes);


app.listen(3000, ()=> console.log("running on port 3000"));