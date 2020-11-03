module.exports = {
    attributes: {        
        userNotification: {
            model: 'user' //Through associations relationship
        },
        taskNotification: { //Through associations relationship
            model: 'tasks'
        }
    }
}