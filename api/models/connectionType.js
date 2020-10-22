module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idConnectionType',
            columnType: 'int',
            unique: true, 
            required: false,
            autoIncrement: true
        },
        name: {
            type: 'string',
            columnName: 'connectionTypeName',
            columnType: 'varchar(100)',
            required: true
        },
        description: {
            type: 'string',
            columnName: 'descriptionConnectionType',
            columnType: 'varchar(150)',
            required: false
        },
        //Relationship fields
        relatedToHost: {
            collection: 'host',
            via: 'connectionTypeHost'
        }
    }
}