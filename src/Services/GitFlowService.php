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

    public function GitRepoMainBranch($repo){
        // returns branch instance of current checked out branch
        return ($this -> GitRepoUse($repo)) -> getMainBranch();
    }

    public function GitRepoCommit($repo){
        //returns a commit instance of the current head of a specified repo
        $repo = ($this->GitRepoUse($repo));
        return $repo-> getCommit();   
    }

    public function GitRepoCommitSHA($repo,$sha){
        //returns a commit instance of specified sha from a specified repo 
        $repo = ($this->GitRepoUse($repo));
        return $repo -> getCommit($sha);

    }

    public function GitRepoCommitByTag($repo,$tag){
        // returns commit instance for a tag in a specified repo
        $repo = ($this->GitRepoUse($repo));
        return $repo-> getCommit($tag);

    }

    public function GitRepoTags($repo){
        // returns array of tag instances
        $repo = ($this->GitRepoUse($repo));
        return $repo->getTags();

    }
    
    public function GitRepoTag($repo,$tag){
        // returns a tag instance by name
        $repo = ($this->GitRepoUse($repo));
        return $tag->getTag();
        
    }

    public function GitRepoLastTag($repo){
        //returns last tag by date
        $repo = ($this->GitRepoUse($repo));
        return $repo->getLastTag();
    }

}


