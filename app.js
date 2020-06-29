var express = require('express');
const bodyParser = require('body-parser');
var app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.get('/', (req, res)=>{
    res.send('dev hell')
    res.json({ message: 'welcome'})
});

require("./src/routes/languages.routes.js")(app);

app.listen(3000);