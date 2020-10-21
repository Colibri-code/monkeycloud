module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idBackup',
            columnType: 'int',
            unique: true, 
            required: false,
            autoIncrement: true
        },
        url: {
            type: 'string',
            columnName: 'backupUrl',
            columnType: 'varchar(300)',
            required: true
        },
        creationDate: {
            type: 'ref',
            columnName: 'backupCreationDate',
            columnType: 'date',
            required: false
        },
        isActive: {
            type: 'boolean',
            columnName: 'isActive'
        },
        //Relationship fields        
        relatedToScheBackup: { //one to many relationship with scheduleBackup
            model: 'scheduleBackup',            
        },
        userRelated: { //one to one relationship with user
            collection: 'user',
            via: 'backupRelated'
        },


    }
}