module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idFrequency',
            columnType: 'int',
            unique: true,
            required: false,
            autoIncrement: true
        },
        name: {
            type: 'string',
            columnName: 'frequencyName',
            columnType: 'varchar(100)',
            required: false
        },
        description: {
            type: 'string',
            columnName: 'frequencyDescription',
            columnType: 'varchar(300)',
            required: false
        },
        every: {
            type: 'number',
            columnName: 'every',
            columnType: 'int',
            required: false
        },
        //Relationship fields
        scheduleFrecuency: { //one to one relationship with scheduleBackup
            model: 'scheduleBackup',
            unique: true
        }
    }
}