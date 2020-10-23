module.exports = {
    attributes: {
        id: {
            type: "number",            
            columnType: "int",
            columnName: "historyLogId",
            required: false,            
            unique: true,
            autoIncrement: true,
        },
        name: {
            type: "string",            
            columnType: "varchar(20)",
            columnName: "historyLogName",                       
            unique: true,            
        },
        historyTask: {
            model: 'tasks'            
        },
        historyUsers: {
            model: 'user'
        }      

    }
}