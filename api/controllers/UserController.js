/**
 * UserController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */



module.exports = {

    create: async function(req, res) {
        if (req.body == null) {
            return res.send('null body')
        } else {
            const userCreated = await user.create(req.body).fetch();
            return res.json(userCreated);
        }
    },
    read: async function(req, res) {
        if (req.params.id != undefined) {
            const readUser = await user.findOne(req.params.id);
            return res.json(readUser);
        } else {
            return res.send('invalid input');
        }
    },
    update: async function(req, res) {
        if (req.body == null || req.body.id == undefined || Object.keys(req.body) < 2) {
            return res.send('invalid input');
        } else {
            const userUpdated = await user.update(req.body.id).set(req.body).fetch();
            return res.json(userUpdated);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deletedUser = await user.destroyOne(req.params.id);
            return res.json(deletedUser);
        } else {
            return res.send('invalid input');
        }
    }


}