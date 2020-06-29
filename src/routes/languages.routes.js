module.exports = app => {
    const LanguageRoute = require('../controllers/language.controller.js');
    
    app.post('/create/language', LanguageRoute.create);
};