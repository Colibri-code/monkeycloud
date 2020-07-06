module.exports = {
    attributes: {
        name: {
            type: 'string', columnType: 'varchar(20)', required: false, columnName: 'name'
        },
        team: {
            type: 'string', columnType: 'varchar(20)', required: false, columnName: 'team'
        },
        department: {
            type: 'string', columnType: 'varchar(20)', required: false, columnName: 'department'
        },
        user: {
            model: 'user',
            unique: true
        }
    }
}