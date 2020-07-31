
module.exports = {
    attributes: {
        id: {
            type: 'number', columnName: 'iduser', columnType: 'int', required: false, autoIncrement: true, unique: true        
        },
        username:{
            type: 'string', required: false, columnName: 'username', columnType: 'varchar(20)'

        },
        fullname:{
            type: 'string', required: false, columnName: 'fullname', columnType: 'varchar(45)'
        },
        bio:{
            type: 'string', required: false, columnName: 'bio', columnType: 'varchar(200)'
        },
        location:{
            type: 'string', required: false, columnName: 'location', columnType: 'varchar(20)'
            
        },
        isvisible:{
            type: 'boolean', columnName: 'isvisible'
        },
        languages:{
            type:'json', columnName: 'languages', defaultsTo: null, columnType: 'JSON'
        },
        email: {
            type: 'string', columnName: 'email', unique: true, required: true, columnType: 'varchar(45)'
        },
        password: {
            type: 'string', columnName: 'password', required: true, columnType: 'varchar(20)'
        },
        workinfo: {
            collection: 'workinfo',
            via: 'user'

        }, taskscreated: {
            collection: 'tasks',
            via: 'createdby'
        },
        workingon: {
            collection: 'tasks',
            via: 'takenby'
        }

    }
}