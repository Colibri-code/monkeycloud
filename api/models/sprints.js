module.exports = {
    attributes: {
        id: {
            type: 'number', unique: true, required: true, columnName: 'idsprint', columnType: 'int' 
        },
        name: {
            type: 'string', required: false, columnType:'varchar(20)', columnName: 'name'
        },
        project: {
            model: 'projects'
        },
        tasks: {
            collection: 'tasks',
            via: 'sprint'
        }
    }
}