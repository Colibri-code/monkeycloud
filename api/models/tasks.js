module.exports = {
    attributes: {
        id: {
            type: 'number',
            columnName: 'idtask',
            columnType: 'int',
            required: false,
            autoIncrement: true,
            unique: true
        },
        name: {
            type: 'string',
            required: false,
            columnName: 'name',
            columnType: 'varchar(20)'
        },
        description: {
            type: 'string',
            required: false,
            columnName: 'description',
            columnType: 'varchar(45)'
        },
        summary: {
            type: 'string',
            required: false,
            columnName: 'summary',
            columnType: 'varchar(100)'
        },
        timetracking: {
            type: 'string',
            required: false,
            columnName: 'timetracking',
            columnType: 'varchar(45)'
        },
        watching: {
            type: 'string',
            required: false,
            columnName: 'watching',
            columnType: 'varchar(45)'

        },
        sprint: {
            model: 'sprints',
            required: false
        },
        linkedto: {
            collection: 'tasks',
            via: 'relatedto'
        },
        relatedto: {
            model: 'tasks',
            required: false
        },
        createdby: {
            model: 'user',
        },
        takenby: {
            collection: 'user',
            required: false
        },

        //------------------------------New fields -------------------------------
        comments: {
            type: 'string',
            required: false,
            columnName: 'comments',
            columnType:'varchar(150)'
        },
        commentsTiming: {
            type: 'string',
            required: true,
            columnName: 'commentsTiming',
            columnType: 'varchar(45)'
        },
        //------------------------------ !Important must consider the behavior of these attribute
        commentOwner: {
            model: 'user',
            required: false
        },
        commentedBy: {
            collection: 'user',
            required: false
        },
        workLog: { //References a work log in a one to one relationship, a task can only have a worklog relationship
            model: 'workLog',
            unique: true
        },
        users: { // Error
            collection: 'user',
            via: 'taskNotification', //it doesn't exist on user model
            through: 'notifications'
        },
        //------------------------------

        priority: {
            type: 'string',
            required: true,
            columnName: 'priority',
            columnType: 'varchar(20)'
        },
        estimated: {
            type: 'number',
            required: false,
            columnName: 'estimated',
            columnType: 'int'
        },
        labels: { // references label in a one to one relationship
            collection: 'labels',
            via: 'tasks'
        },
        component: { //references  component one to one  relationship
            collection: 'component',
            via: 'taskComponent'
        },
        taskState: {
            collection: 'state',
            via: 'state'
        },
        attachment: {
            type: 'ref',
            columnName: 'attachment',
            columnType: 'LONGBLOB',  //Long Binary Large Object
            required: false
        },
        historiesUser: { //must consider the behavior of this attribute (Through associations) --the history of a task can have more than one user
            collection: 'user', //References user
            via: 'historyTask', //References task
            through: 'historyLog' //junction table (history log)
        }
        //--------------------------End of new fields-----------------------------
    }
}
