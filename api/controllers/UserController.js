/**
 * UserController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

const {OAuth2Client} = require("google-auth-library")
const client = new OAuth2Client(sails.config.globals.googleClient)


module.exports = {
  create: async function (req, res) {
    try {
      const user = await User.create(req.body).fetch();
      const token = await sails.helpers.generateAuthToken(user.id);
      res.send({ user, token });
    } catch (error) {
      res.badRequest();
    }
  },

  login: async function (req, res) {
    try {
      const user = await User.findOne({ email: req.body.email }).decrypt();
      if (!user) return res.notFound();
      if (user.password !== req.body.password) return res.notFound();
      const token = await sails.helpers.generateAuthToken(user.id);
      res.send({ user, token });
    } catch (error) {
      res.badRequest();
    }
  },

  read: async function (req, res) {
    if (req.params.id) {
      const user = await User.findOne(req.params.id);
      res.json(user);
    } else {
      res.notFound();
    }
  },

  update: async function (req, res) {
    try {
      const user = await User.update(req.user).set(req.body).fetch();
      res.send({ user });
    } catch (error) {
      res.badRequest();
    }
  },

  delete: async function (req, res) {
    try {
      await User.destroyOne(req.user);
      res.send();
    } catch (error) {
      res.badRequest();
    }
  },

  googleLogin: async function(req,res) {
    try {
      const {payload:{email,name}} = await client.verifyIdToken({idToken:req.body.tokenId,audience:sails.config.globals.googleClient})
      var user = await User.findOne({email})
      if(!user) {
        user = await User.create({email,fullname:name}).fetch();
      }
      const token = await sails.helpers.generateAuthToken(user.id);
      res.send({user,token})
    } catch (error) {
      res.badRequest()
    }
  },

};
