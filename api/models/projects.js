module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idproject',
            columnType: 'int',
            required: false,
            autoIncrement: true,
            unique: true
        },
        name: {
            type: 'string',
            columnName: 'name',
            columnType: 'varchar(20)',
            required: false
        },
        wiki: {
            type: 'string',
            columnName: 'wiki',
            columnType: 'varchar(100)',
            required: false
        },
        labels: {
            type: 'json',
            columnName: 'labels',
            defaultsTo: null,
            required: false,
            columnType: 'JSON'
        },        
        sprints: {
            collection: 'sprints',
            via: 'project'
        },

        //New fields
        company: {
            model: 'company',
            unique: true,
            required: true
        },
        enviromentsProject: {
            collection: 'enviroments'
        },
        agency: { //one to many relationship one agency can have multiple projects
            model: 'agency'
        }
    }
}