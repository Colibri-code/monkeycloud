module.exports = {
    attributes: {
        id: {
            type: 'number', columnName: 'idlanguage', columnType: 'int', required: false, autoIncrement: true, unique: true
        },
        language: {

            type: 'string', required: false, columnType: 'varchar(20)'
        }
    }
}