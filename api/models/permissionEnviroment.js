module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idPermissionEnv',
            columnType: 'int',
            unique: true,
            required: false,
            autoIncrement: true
        },
        description: {
            type: 'string',
            columnName: 'permissionEnvDescription',
            columnType: 'varchar(150)',            
            required: false,
        },
        // Relationship fields
        enviromentRelated: { //one to many relationship
            model: 'enviroments'            
        },
        relatedToUser: { //one to one relationship
            collection: 'user',
            via: 'relatedToPermissionEnv'
        }
    }
}