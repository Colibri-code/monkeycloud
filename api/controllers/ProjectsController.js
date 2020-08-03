/**
 * ProjectsController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */


module.exports = {
    create: async function(req, res) {
        if (Object.keys(req.body) == 0) {
            return res.send('null body')
        } else {
            const projectCreated = await projects.create(req.body).fetch();
            return res.json(projectCreated);
        }
    },
    read: async function(req, res) {
        if (req.params.id != undefined) {
            const readProject = await projects.findOne(req.params.id);
            return res.json(readProject);
        } else {
            return res.send('invalid input');
        }
    },
    update: async function(req, res) {
        if (Object.keys(req.body) == 0 || req.body.id == undefined) {
            return res.send('invalid input');
        } else {
            const projectUpdated = await projects.update(req.body.id).set(req.body).fetch();
            return res.json(projectUpdated);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deletedProject = await projects.destroyOne(req.params.id);
            return res.json(deletedProject);
        } else {
            return res.send('invalid input');
        }
    }

};