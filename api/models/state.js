module.exports = {
    attributes: {
        id: {
            type: "number",            
            columnType: "int",
            columnName: "idState",
            required: false,            
            unique: true,
            autoIncrement: true,
        },
        name: {
            type: "string",            
            columnType: "varchar(20)",
            columnName: "stateName",                       
            unique: true,            
        },
        state:{
            model: 'tasks',
            unique: true
        }

    }
}