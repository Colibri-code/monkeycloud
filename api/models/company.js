module.exports = {
    attributes:{
        id: {
            type: 'number', columnName: 'idcompany', columnType: 'int', required: false, autoIncrement: true, unique: true
        },
        name: {
            type: 'string', columnName: 'name', columnType: 'varchar(20)', required: false
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