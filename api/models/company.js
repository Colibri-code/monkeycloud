module.exports = {
    attributes:{
        id: {
            type: 'number', required: true, columnName: 'idcompany', unique: true, columnType: 'int'
        },
        name: {
            type: 'string', columnName: 'name', columnType: 'varchar(20)',
        },
        teams: {
            type: 'json', columnName: 'teams', defaultsTo: null, columnType:'JSON'
        },
        departments: {
            type: 'json', columnName: 'departments', defaultsTo: null, columnType:'JSON'
        },
        projects: {
            collection: 'projects',
            via: 'company',
        }
    }
};