module.exports = {
    attributes: {
        id: {
            type: 'number', columnType:'int', columnName: 'idproject', unique: true, required: true
        },
        name: {
            type: 'string', columnName: 'name', columnType:'varchar(20)', required: false
        },
        wiki: {
            type: 'string', columnName: 'wiki', columnType:'varchar(100)', required: false
        },
        labels: {
            type: 'json', columnName: 'labels', defaultsTo: null, required: false, columnType: 'JSON'
        },
        company: {
            model: 'company',
            unique: true
        },
        sprints: {
            collection: 'sprints',
            via: 'project'
        },
    }
}