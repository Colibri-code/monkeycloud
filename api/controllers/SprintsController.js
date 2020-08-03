/**
 * SprintsController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

module.exports = {
    create: async function(req, res) {
        if (Object.keys(req.body) == 0) {
            return res.send('null body')
        } else {
            const sprintCreated = await sprints.create(req.body).fetch();
            return res.json(sprintCreated);
        }
    },
    read: async function(req, res) {
        if (req.params.id != undefined) {
            const readSprint = await sprints.findOne(req.params.id);
            return res.json(readSprint);
        } else {
            return res.send('invalid input');
        }
    },
    update: async function(req, res) {
        if (Object.keys(req.body) == 0 || req.body.id == undefined) {
            return res.send('invalid input');
        } else {
            const sprintUpdated = await sprints.update(req.body.id).set(req.body).fetch();
            return res.json(sprintUpdated);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deletedSprint = await sprints.destroyOne(req.params.id);
            return res.json(deletedSprint);
        } else {
            return res.send('invalid input');
        }
    }


};