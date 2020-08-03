module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idsprint',
            columnType: 'int',
            required: false,
            autoIncrement: true,
            unique: true
        },
        name: {
            type: 'string',
            required: false,
            columnType: 'varchar(20)',
            columnName: 'name'
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