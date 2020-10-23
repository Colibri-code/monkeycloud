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
        // duda el campo va ser varchar , int o char
        /* 
        type:'ref',
        columnType:'char'

        */
        duration:{
            type:'number',
            columnName:'duration',
            columnType:'int',
            required:true
        },
        startDate:{
            type:'ref',
            columnName:'startDate',
            columnType:'DATE',
            required:true
        },
        endDate:{
            type:'ref',
            columnName:'startDate',
            columnType:'DATE',
            required:true
        },
        sprintGoal:{
            type:'string',
            columnName:'sprintGoal',
            columnType:'varchar(100)',
            required:true
        },
        isActive:{
            type:'boolean',
            columnName:'isActive',
            defaultsTo:false,
            required:true

        },
        // duda con relacion entre sprint y historial , si la entidad es historyLog
        project: {
            model: 'projects'
        },
        tasks: {
            collection: 'tasks',
            via: 'sprint'
        }
    }
}