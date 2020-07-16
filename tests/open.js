const simpleGit = require("simple-git");
const options = {
    baseDir: process.cwd("C:/Users/dandi/Documents/projects/monkeycloud/.git"),
    binary: 'git',
    maxConcurrentProcesses: 6,
}
const git = simpleGit(options);
module.exports = git.log((err, log)=> {
    if(!err){
        console.log(log)
    }else{
        console.log(err)
    }
});

