module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'agencyId',
            columnType: 'int',
            unique: true,
            required: false,
            autoIncrement: true
        },
        name: {
            type: 'string',
            columnName: 'agencyName',
            columnType: 'varchar(20)',
            required: true
        },
        website: {
            type: 'string',
            columnName: 'website',
            columnType: 'varchar(100)',
            required: true
        },
        phone: {
            type: 'string',
            columnName: 'phoneNumber',
            columnType: 'varchar(20)',            
            required: false,
        },
        email: {
            type: 'string',
            columnName: 'agencyEmail',
            columnType: 'varchar(50)',
            required: true
        },
        icon: { //agency logo
            type: 'ref',
            columnName: 'agencyIcon',
            columnType: 'MEDIUMBLOB',
            required: false
        },
        //Relationships
        users: { //an agency can have multiple users but a user will only have one agency to belong
            collection: 'user',
            via: 'agency'
        },
        adminUser: { //one to one relationship one admin user will manage only one company
            model: 'user',
            unique: true
        },
        projects: { //one to many relationship one agency can have multiple projects
            collection: 'projects',
            via: 'agency'
        },
        billInformation: { //one way relationship
            model: 'bills'
        }
    }
}