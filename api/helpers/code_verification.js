/* eslint-disable no-trailing-spaces */
/* eslint-disable linebreak-style */
/* eslint-disable indent */
const cryptoRandomString = require('crypto-random-string');

module.exports = {
    friendlyName: 'Generate code',

    description: 'Generates code',
    inputs: {},
    
    fn: async function (inputs,exits){       
        const pin = cryptoRandomString({length: 6, type: 'numeric'});
        exits.success(pin);
      
    }
    
}