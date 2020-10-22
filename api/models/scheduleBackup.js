module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idScheduleBackup',
            columnType: 'int',
            unique: true, 
            required: false,
            autoIncrement: true
        },
        hourToStart: {
            type: 'string',
            columnName: 'hourToStart',
            columnType: 'varchar(10)',
            required: true
        },
        startDate: {
            type: 'ref',
            columnName: 'startDate',
            columnType: 'date',
            required: true
        },
        endDate: {
            type: 'ref',
            columnName: 'endDate',
            columnType: 'date',
            required: true
        },
        //relationship fields
        relatedToBackup: { //one to one relationship with backup 
            collection: 'backup',
            via: 'relatedToScheBackup'
        },
        relatedToFrequency: {
            collection: 'frequency',
            via: 'scheduleFrecuency'
        }
    }
}