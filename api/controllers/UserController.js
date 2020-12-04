/**
 * UserController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

const { OAuth2Client } = require("google-auth-library");
const client = new OAuth2Client(sails.config.custom.googleClient);
const stripe = require("stripe")(sails.config.custom.stripeKey);

module.exports = {
  create: async function (req, res) {
    try {
      if (!req.body.password) return res.serverError("Invalid Data");
      const newUser = await user.create(req.body).fetch();
      const token = await sails.helpers.generateAuthToken(newUser.id);
      res.send({ user: newUser, token });
    } catch (error) {
      res.serverError("Invalid Data");
    }
  },

  login: async function (req, res) {
    try {
      const loggedUser = await user
        .findOne({ email: req.body.email })
        .decrypt();
      if (!loggedUser) return res.notFound();
      if (loggedUser.password !== req.body.password) return res.notFound();
      const token = await sails.helpers.generateAuthToken(loggedUser.id);
      res.send({ user: loggedUser, token });
    } catch (error) {
      res.serverError("Invalid Data");
    }
  },

  read: async function (req, res) {
    if (req.params.id) {
      const data = await user.findOne(req.params.id);
      res.json({ user: data });
    } else {
      res.notFound();
    }
  },

  me: async function (req, res) {
    try {
      const User = await user.findOne(req.user);
      res.send({ user: User });
    } catch (error) {
      res.serverError();
    }
  },

  update: async function (req, res) {
    try {
      const data = await user.update(req.user).set(req.body).fetch();
      res.send({ user: data });
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

  googleLogin: async function (req, res) {
    try {
      const {
        payload: { email, name },
      } = await client.verifyIdToken({
        idToken: req.body.tokenId,
        audience: sails.config.custom.googleClient,
      });
      var loggedUser = await user.findOne({ email });
      if (!loggedUser) {
        loggedUser = await user.create({ email, fullname: name }).fetch();
      }
      const token = await sails.helpers.generateAuthToken(loggedUser.id);
      res.send({ user: loggedUser, token });
    } catch (error) {
      res.badRequest();
    }
  },
  //sub
  subscription: async function (req, res) {
    try {
      const loggedUser = await user.findOne(req.user);
      //create a paymethod
      const token = await stripe.tokens.create(req.body);
      //create customer
      const userUpdate = {};
      var customer;
      if (!loggedUser.stripeCustomerId) {
        customer = await stripe.customers.create({
          email: loggedUser.email,
          source: token.id,
        });
        userUpdate.stripeCustomerId = customer.id;
        userUpdate.typeMember = "premium";
      } else {
        customer = await stripe.customers.update(loggedUser.stripeCustomerId, {
          source: token.id,
        });
        userUpdate.typeMember = "premium";
      }

      //create subscription
      const subscription = await stripe.subscriptions.create({
        customer: customer.id,
        items: [{ price: sails.config.custom.stripePremiumSubscription }],
      });
      //change user
      await user
        .update(req.user)
        .set({ ...userUpdate, stripeSubId: subscription.id });
      res.send({ message: "Payment done successfully" });
    } catch (error) {
      res.serverError(error);
    }
  },
  changeCreditCard: async function (req, res) {
    try {
      const loggedUser = await user.findOne(req.user);
      if (!loggedUser.stripeCustomerId) return res.serverError("Server Error");
      const token = await stripe.tokens.create(req.body);
      await stripe.customers.update(loggedUser.stripeCustomerId, {
        source: token.id,
      });
      res.send({ message: "Card changed successfully" });
    } catch (error) {
      res.serverError();
    }
  },
  cancelSubscription: async function (req, res) {
    try {
      const loggedUser = await user.findOne(req.user);
      const { current_period_end } = await stripe.subscriptions.del(
        loggedUser.stripeSubId
      );
      await user.update(req.user).set({
        stripeSubId: null,
        subscriptionDateEnd: current_period_end,
      });
      res.send({ message: "Subscription cancel" });
    } catch (error) {
      res.serverError();
    }
  },
};
