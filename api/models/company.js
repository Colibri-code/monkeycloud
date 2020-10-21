module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idcompany',
            columnType: 'int',
            required: false,
            autoIncrement: true,
            unique: true
        },
        name: {
            type: 'string',
            columnName: 'name',
            columnType: 'varchar(20)',
            required: true,
            unique: true
        },
        teams: {
            type: 'json',
            columnName: 'teams',
            defaultsTo: null,
            columnType: 'JSON'
        },
        departments: {
            type: 'json',
            columnName: 'departments',
            defaultsTo: null,
            columnType: 'JSON'
        },        
        tokens: {
            type: 'string',
            columnName: 'tokens',
            columnType: 'varchar(100)',
            required: false
        },
        //New field, relationship one to one with the enviroment module
        relatedProjects: { //one to many relationship
            collection: 'projects',
            via: 'company'
        }        
    }
};