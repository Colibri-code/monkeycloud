/**
 * LanguagesController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */


module.exports = {

    create: async function(req, res) {
        if (req.body == null || req.body.language == undefined || Object.keys(req.body) > 1) {
            return res.send('null body')
        } else {
            const languageCreated = await languages.create(req.body).fetch();
            return res.json(languageCreated);
        }
    },
    read: async function(req, res) {
        const readLanguages = await languages.find({ id: { '>=': '1' } });
        return res.json(readLanguages);
    },
    update: async function(req, res) {
        if (req.body == null || req.body.id == undefined || Object.keys(req.body) > 2) {
            return res.send('invalid input');
        } else {
            const updatedLanguage = await languages.update(req.body.id).set(req.body).fetch();
            return res.json(updatedLanguage);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deletedLanguage = await languages.destroyOne(req.params.id);
            return res.json(deletedLanguage);
        } else {
            return res.send('invalid input');
        }
    }


};