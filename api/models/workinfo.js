module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idworkinfo',
            columnType: 'int',
            required: false,
            autoIncrement: true,
            unique: true
        },
        name: {
            type: 'string',
            columnType: 'varchar(20)',
            required: false,
            columnName: 'name'
        },
        team: {
            type: 'string',
            columnType: 'varchar(20)',
            required: false,
            columnName: 'team'
        },
        department: {
            type: 'string',
            columnType: 'varchar(20)',
            required: false,
            columnName: 'department'
        },
        user: {
            model: 'user',
            required: true
        },
    }
}