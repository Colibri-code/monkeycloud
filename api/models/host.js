module.exports = {

    attributes: {
        id: {
            type: 'number',
            columnName: 'idHost',
            columnType: 'int',
            unique: true,
            required: false,        
            autoIncrement: true
        },
        url: {
            type: 'string',
            columnName: 'hostUrl',
            columnType: 'varchar(300)',
            required: true
        },
        description: {
            type: 'string',
            columnName: 'hostDescription',
            columnType: 'varchar(150)',
            required: false
        },
        //Relationship fields 
        enviromentHost: { //One to one relationship with enviroments model
            model: 'enviroments',
            unique: true
        },
        connectionTypeHost: {
            model: 'connectionType',
            unique: true
        }
    }

}