const sql = require('../connection.js');

const Languages = function(argument)
{
    this.language = argument.language;
}

Languages.create = (newLanguage, result) => {
     sql.query('INSERT INTO `monkeysclouddb`.`languages` SET ?', newLanguage, (err, res) => {
        if(err) {
            console.log('error', err);
            result(err, null);
            return;
        } else {
            sql.connect();
            console.log('created language: ', res.insertId, newLanguage );
            result(null, res.insertId.toString(), newLanguage.language);
            sql.end();}
    });
};


module.exports = Languages;