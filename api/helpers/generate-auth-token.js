const jwt = require("jsonwebtoken");

module.exports = {
  friendlyName: "Generate auth token",

  description: "Return a token for the logged user",

  inputs: {
    id: {
      type: "number",
      required: true,
    },
  },

  fn: async function (inputs, exits) {
    const token = await jwt.sign(
      { id: inputs.id },
      sails.config.session.secret
    );
    return exits.success(token);
  },
};
