const jwt = require('jsonwebtoken');
const secretKey =  'THIS_IS_SECRET'

module.exports = {
  friendlyName: 'Generate auth token',

  description: 'Return a token for the logged user',

  inputs: {
    id: {
      type: 'number',
      required: true,
    },
  },

  fn: async function (inputs, exits) {
    const token = await jwt.sign({ id: inputs.id }, secretKey );
    return exits.success(token);
  },
};
