/**
 * UserController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

module.exports = {
  create: async function (req, res) {
    try {
      const user = await User.create(req.body).fetch();
      const token = await sails.helpers.generateAuthToken(user.id);
      res.send({ user, token });
    } catch (error) {
      res.status(400).send();
    }
  },

  login: async function (req, res) {
    try {
      const user = await User.findByCredentials(
        req.body.email,
        req.body.password
      );
      const token = await sails.helpers.generateAuthToken(user.id);
      res.send({ user, token });
    } catch (error) {
      res.status(400).send();
    }
  },

  read: async function (req, res) {
    try {
      const user = await User.findOne(req.params.id);
      if (!user) return res.status(404).send();
    } catch (error) {
      res.status(400).send();
    }
  },
  
  update: async function (req, res) {
    try {
      const user = await User.update(req.user.id).set(req.body).fetch();
      res.send({ user });
    } catch (error) {
      res.badRequest();
    }
  },
  
  delete: async function (req, res) {
    try {
      await User.destroyOne(req.user.id);
      res.send();
    } catch (error) {
      res.badRequest();
    }
  },
};
