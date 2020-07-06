module.exports = {
    attributes: {
        id: {
            type: 'number', required: true, columnName: 'idlanguage', autoIncrement: true, columnType: 'int'
        },
        language: {

            type: 'string', required: true, columnType: 'varchar(20)'
        }
    }
}