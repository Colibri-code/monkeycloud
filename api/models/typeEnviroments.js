module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idTypeEnviroment',
            columnType: 'int',
            unique: true,
            required: false,
            autoIncrement: true
        },
        name: {
            type: 'string',
            columnName: 'typeEnviromentName',
            columnType: 'varchar(20)',
            required: false
        }
    }
}