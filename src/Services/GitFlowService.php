<?php


namespace App\Service;

use GitElephant\Repository;


Class GitRepo{

    public function GitRepoUse($repo){
        // opens repository passed to repo
        return $repo = Repository::open($repo);
    }

    public function GitRepoBranches($repo){
        // returns branches from the repo
        return ($this -> GitRepoUse($repo))-> getBranches();
    }

    public function GitRepoBranch($branch, $repo){
        // returns specified branch from a specific repo
        $repo = ($this->GitRepoUse($repo));
        return  $repo -> getBranch(strval($branch));
    }

}


