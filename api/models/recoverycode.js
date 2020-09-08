
module.exports = {
    attributes: {
        idUser: {
            model: 'user',
            columnName: 'idUser',
            required: true,
            unique: true
        },
        code: {
            type: 'number',
            columnName: 'code',
            columnType: 'int',
            required: true,            
            unique: false
        },
        expiration: {
            type: 'number',
            columnName: 'expirationDate',
            required: true            
        },    
    }
};