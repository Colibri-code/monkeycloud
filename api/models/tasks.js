module.exports = {
    attributes: {
        id: {
            type: 'number', required: true, columnName: 'idtask', columnType: 'int'
        },
        name: {
            type: 'string', required: false, columnName: 'name', columnType: 'varchar(20)'
        },
        description: {
            type: 'string', required: false, columnName: 'description', columnType: 'varchar(45)'
        },
        summary: {
            type: 'string', required: false, columnName: 'summary', columnType: 'varchar(100)'
        },
        timetracking: {
            type: 'string', required: false, columnName: 'timetracking', columnType: 'varchar(45)'
            
        },
        watching: {
            type: 'string', required: false, columnName: 'watching', columnType: 'varchar(45)'
            
        },
        sprint: {
            model: 'sprints', required:true
        },
        linkedto:{
            collection: 'tasks',
            via: 'relatedto'
        },
        relatedto:{
            model:'tasks', required: false
        }, 
        createdby:{
            model: 'user', unique: true
        }, 
        takenby:{
            collection: 'user',
            via: 'workingon'
        } 
        
    }
}