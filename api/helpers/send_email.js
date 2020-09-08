/* eslint-disable linebreak-style */
/* eslint-disable indent */
const nodemailer = require("nodemailer");
const Mail = require("nodemailer/lib/mailer");
const { emailConfiguration } = require("../../config/env/production");

module.exports = {

    friendlyName: 'Send emails',

    description: 'Send emails',

    inputs: {

        from: {
          type: 'string',
          example: 'example@mail.com',
          description: 'email sender',
          required: true
        },
        to: {
            type: 'string',
            example: 'example@mail.com',
            description: 'receive email',
            required: true
          },
        subject: {
            type: 'string',
            example: 'example@mail.com',
            description: 'receive email',
            required: true
        },
        html:{
            type: 'string',
            example: '<b>This is a email body</b>',
            description: 'A body of email',
            required: true
        }
    
    },

    fn: async function (inputs,exits){ 

        let transporter = nodemailer.createTransport({
        host: emailConfiguration.host,
        port: emailConfiguration.port,
        secure: false, // true for 465, false for other ports
        auth: {
            user: emailConfiguration.user, // generated ethereal user
            pass: emailConfiguration.pass, // generated ethereal password
            },
        });
        
    
        // send mail with defined transport object
        let info = await transporter.sendMail({
            from: inputs.from, // sender address
            to: inputs.to, // list of receivers
            subject: inputs.subject, // Subject line
            //text: "Hello world?", // plain text body
            html: inputs.html, // html body
        });

        console.log("Message sent: %s", info.messageId);
        // Message sent: <b658f8ca-6296-ccf4-8306-87d57a0b4321@example.com>

        // Preview only available when sending through an Ethereal account
        console.log("Preview URL: %s", nodemailer.getTestMessageUrl(info));
        // Preview URL: https://ethereal.email/message/WaQKMgKddxQDoou...
        exits.success("Success");

    }
}