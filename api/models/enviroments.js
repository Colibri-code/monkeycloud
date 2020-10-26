module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idEnviroment',
            columnType: 'int',
            unique: true,
            autoIncrement: true,
            required: false
        },
        name: {
            type: 'string',
            columnName: 'enviromentName',
            columnType: 'varchar(25)',
            required: false
        },
        isActive: {
            type: 'boolean',
            columnName: 'isActive'
        },
        description: {
            type: 'string',
            columnName: 'enviromentDescription',
            columnType: 'varchar(150)',
            required: false
        },
        //Relationship fields
        relatedProject: { //relationship one to many
            model: 'projects',                        
        },
        hostRelatedTo: { //one to one relationship with host model
            collection: 'host',
            via: 'enviromentHost'
        },
        permissiionsEnviroment: { //one to many relationship with permissiion Enviroment model
            collection: 'permissionEnviroment',
            via: 'enviromentRelated'            
        }
    }
}