/**
 * CompanyController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

module.exports = {

    create: async function(req, res) {
        if (req.body == null) {
            return res.send('null body')
        } else {
            const companyCreated = await company.create(req.body).fetch();
            return res.json(companyCreated);
        }
    },
    read: async function(req, res) {
        if (req.params.id != undefined) {
            const readCompany = await company.findOne(req.params.id);
            return res.json(readCompany);
        } else {
            return res.send('invalid input');
        }
    },
    update: async function(req, res) {
        if (req.body.id == undefined || Object.keys(req.body) == null) {
            return res.send('invalid input');
        } else {
            const companyUpdated = await company.update(req.body.id).set(req.body).fetch();
            return res.json(companyUpdated);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deletedCompany = await company.destroyOne(req.params.id);
            return res.json(deletedCompany);
        } else {
            return res.send('invalid input');
        }
    }


};