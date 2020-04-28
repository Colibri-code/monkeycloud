<?php


namespace App\Service;

use GitElephant\Repository;


Class GitRepo{

    function GitRepoUse($repo){
        // opens repository passed to repo
        return $repo = Repository::open($repo);
    }

    function GitRepoBranches($repo){
        // returns branches from the repo
        return ($this -> GitRepoUse($repo))-> getBranches();
    }

}


?>