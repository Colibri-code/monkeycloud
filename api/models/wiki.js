module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idWiki',
            columnType: 'int',
            required: false,
            autoIncrement: true,
            unique: true
        },
        title: {
            type: 'string',
            columnName: 'title',
            columnType: 'varchar(20)',
            required: true
        },
        content: {
            type: 'string',
            columnName: 'content',
            columnType: 'varchar(100)',
            required: false
        },
        message: {
            type: 'string',
            columnName: 'message',
            columnType: 'varchar(25)',
            required: false
        },
        relatedto: { //References to projects
            model: 'projects',
            required: true
        }
    }
}