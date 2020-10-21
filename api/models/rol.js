module.exports = {
    attributes: {
        id: {
            type: "number",            
            columnType: "int",
            columnName: "idRol",
            required: false,            
            unique: true,
            autoIncrement: true,
        },
        name: {
            type: "string",            
            columnType: "varchar(20)",
            columnName: "rolName",                       
            unique: true,            
        },
        description: {
            type: "string",            
            columnType: "varchar(150)",
            columnName: "rolDescription",                       
            required: false
        },
        rols:{
            model: 'user'            
        }
    }
}