/**
 * CodeController
 *
 * @description :: Server-side actions for handling incoming requests.
 * @help        :: See https://sailsjs.com/docs/concepts/actions
 */

module.exports = {
    create: async function(req, res) {
        if (Object.keys(req.body) == 0) {
            return res.send('null body')
        } else {
            const codeCreated = await recoverycode.create(req.body).fetch();
            return res.json(codeCreated);
        }
    },
    read: async function(req, res) {
        if (req.params.id != undefined) {
            const readCode = await recoverycode.findOne(req.params.id);
            return res.json(readCode);
        } else {
            return res.send('invalid input');
        }
    },
    update: async function(req, res) {
        if (Object.keys(req.body) == 0 || req.body.id == undefined) {
            return res.send('invalid input');
        } else {
            const codeUpdated = await recoverycode.update(req.body.id).set(req.body).fetch();
            return res.json(codeUpdated);
        }
    },
    delete: async function(req, res) {
        if (req.params.id != undefined) {
            const deleteCode = await recoverycode.destroyOne(req.params.id);
            return res.json(deleteCode);
        } else {
            return res.send('invalid input');
        }
    },

    verifyCode: async function(req, res){
        if (req.body == null) {
            return res.send('null body');
        } else {
            const codeObject = await recoverycode.findOne({idUser: req.body.idUser, code: req.body.code});
            console.log(codeObject);
            if(codeObject){
                if(codeObject.expiration >= Date.now()){
                    await recoverycode.destroyOne(codeObject.id);
                    return res.send("Code is correct");
                    
                }else{
                    return res.send("Code is expired");
                }
                
            }else{
                return res.send("Code is invalid");
            }
        }
    },

    sendCode: async function(req, res){
        if (req.body == null) {
            return res.send('null body');
        } else {

            const pin = await sails.helpers.codeVerification();
            var verificationCode = {
                 idUser : req.body.id,
                 code: pin,
                 expiration: Date.now() + 86400000
            }
            
            const code = await recoverycode.findOne({idUser : req.body.id})       
            const userObject = await user.findOne({id : req.body.id})       
            
            if(code){                
                await recoverycode.destroyOne({idUser : code.idUser})
            }
            if(userObject){
                await recoverycode.create(verificationCode).fetch();
            
                const result =  await sails.helpers.sendEmail.with({from:"hola@hotmail.com",
                                                                to:userObject.email,
                                                                subject:"Recuperar Contraseña",
                                                                html:`<b>Recuperar Contrasena </b>${pin}`});
                if(result === 'Success'){
                    return res.send("The message has been sent");
                }else{
                    return res.send('Error sending email');
                }                                                   
            }else{
                return res.send('The user does not exist');
            }                        
        }
    },



};