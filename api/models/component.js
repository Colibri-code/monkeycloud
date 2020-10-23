module.exports ={
attributes:{
    //agregar atributo id
    id:{
        type:'number',
        columnName:' idcomponent',
        columnType:'int',
        autoIncrement: true,
        unique: true,
        required: false
      },
    name:{
        type:'string',
        columnName:'name',
        columnType:'varchar(25)',
        required:true,
    },
    description:{
        type:'string',
        columnName:'description',
        columnType:'varchar(50)',
        required:false
    },
    taskComponent:{
        model: 'tasks',
        unique:true
    }

},

}