/**
 * WorkinfoController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

module.exports = {

    create: async function(req, res) {
        if (Object.keys(req.body) == null || req.body.user == undefined) {
            return res.send('null body')
        } else {
            const workInfoCreated = await workinfo.create(req.body).fetch();
            return res.json(workInfoCreated);
        }
    },
    read: async function(req, res) {
        if (req.params.id != undefined) {
            const readWorkInfo = await workinfo.findOne(req.params.id);
            return res.json(readWorkInfo);
        } else {
            return res.send('invalid input');
        }
    },
    update: async function(req, res) {
        if (req.body == null || req.body.id == undefined) {
            return res.send('invalid input');
        } else {
            const userUpdated = await workinfo.update(req.body.id).set(req.body).fetch();
            return res.json(userUpdated);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deletedWorkinfo = await workinfo.destroyOne(req.params.id);
            return res.json(deletedWorkinfo);
        } else {
            return res.send('invalid input');
        }
    }

};