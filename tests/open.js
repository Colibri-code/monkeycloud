const git = require('nodegit');

const repositoryPath = require('path').resolve('C:/Users/dandi/Documents/projects/monkeycloud');

const get = function(){ git.Attr.getMany((git.Repository.openExt(repositoryPath))).then(function(array){
    console.log(array);
    return array;
});
}

module.exports = get();