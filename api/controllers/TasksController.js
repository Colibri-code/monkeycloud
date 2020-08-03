/**
 * TasksController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

module.exports = {
    create: async function(req, res) {
        if (Object.keys(req.body) == 0) {
            return res.send('null body')
        } else {
            const taskCreated = await tasks.create(req.body).fetch();
            return res.json(taskCreated);
        }
    },
    read: async function(req, res) {
        if (req.params.id != undefined) {
            const readTask = await tasks.findOne(req.params.id);
            return res.json(readTask);
        } else {
            return res.send('invalid input');
        }
    },
    update: async function(req, res) {
        if (Object.keys(req.body) == 0 || req.body.id == undefined) {
            return res.send('invalid input');
        } else {
            const taskUpdated = await tasks.update(req.body.id).set(req.body).fetch();
            return res.json(taskUpdated);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deleteTask = await tasks.destroyOne(req.params.id);
            return res.json(deleteTask);
        } else {
            return res.send('invalid input');
        }
    }



};