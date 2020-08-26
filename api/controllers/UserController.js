/**
 * UserController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

module.exports = {
  create: async function (req, res) {
    if (req.body == null) {
      res.send("null body");
    } else {
      const user = await User.create(req.body).fetch();
      const token = await sails.helpers.generateAuthToken(user.id);
      res.send({ user, token });
    }
  },

  login: async function (req, res) {
    if (!Object.keys(req.body).length) return res.send("null body");
    const user = await User.findOne({ email: req.body.email }).decrypt();
    if (!user) return res.notFound();
    if (user.password !== req.body.password) return res.notFound();
    const token = await sails.helpers.generateAuthToken(user.id);
    res.send({ user, token });
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
    if (
      req.body == null ||
      req.body.id == undefined ||
      Object.keys(req.body) < 2
    ) {
      res.send("invalid input");
    } else {
      const user = await User.update(req.user).set(req.body).fetch();
      res.send({ user });
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
};
