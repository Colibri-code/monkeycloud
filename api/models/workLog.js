module.exports = {
    attributes: {
        id: {
            type: "number",            
            columnType: "int",
            columnName: "idWorkLog",
            required: false,            
            unique: true,
            autoIncrement: true,
        },
        name: {
            type: "string",            
            columnType: "varchar(20)",
            columnName: "workLogName",                       
            unique: true,            
        },
        taskLogs: { //References a task in a one to one relationship, a worklog can only have a task relationship
            collection: 'tasks',
            via: 'workLog'
        }
    }
}