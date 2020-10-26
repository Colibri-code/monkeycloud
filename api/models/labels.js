module.exports = {
  attributes:{
      //id y nombre
    id:{
      type:'number',
      columnName:' idlabel',
      columnType:'int',
      autoIncrement: true,
      unique: true,
      required: false
    },
    name:{
       type:'string',
       columnName:'name',
       columnType:'varchar(20)',
       required:false
       
    },
    package:{
        type:'json',
        columnName:'package',
        columnType:'JSON',
        required:true
    },
    icon:{
        type:'ref',
        columnName:'icon',
        required:true,
        columnType: 'BLOB'
    },
    // si la relacion entre los labels y tasks
    labelTask:{
        model:'tasks',
        unique:true
    } ,
    usersRelatedTo:{
        colletion: 'user',
        via:'labelsUser'
    }
    
  },
}