<?php


namespace App\Service;

use GitElephant\Repository;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyAccess\PropertyAccessorBuilder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

Class GitRepo{

    public function GitRepoUse($repo){
        // opens repository passed to repo, use only on this class.
        return $repo = Repository::open($repo);
    }

    public function GitRepoBranches($repo){
        // returns names and sha of the branches from a specific repo
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        //$propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
          //  ->enableExceptionOnInvalidIndex()
            //->getPropertyAccessor();
        $repo = $this -> gitRepoUse($repo);
        $repoBranches= $repo->getBranches();

        //var_dump($repoBranches);
        return json_encode($serializer->normalize($repoBranches, null, [AbstractNormalizer::ATTRIBUTES => ['name','sha']]));
    }

    public function GitRepoBranch($branch, $repo){
        // returns name and sha from specific repo and branch
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        //$propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
          //  ->enableExceptionOnInvalidIndex()
            //->disableExceptionOnInvalidPropertyPath()
            //->getPropertyAccessor();

        $serializer = new Serializer($normalizers, $encoders);
        $repo = ($this->GitRepoUse($repo));
        //var_dump($propertyAccessor->getValue($repo,'repositoryPath'));
        return  json_encode($serializer->normalize(($repo -> getBranch($branch)), null, [AbstractNormalizer::ATTRIBUTES => ['name','sha']]));
    }

    public function GitRepoMainBranch($repo){
        // returns branch instance of current checked out branch
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $repo = ($this->GitRepoUse($repo));
        $serializer = new Serializer($normalizers, $encoders);
        return json_encode($serializer->normalize(($repo -> getMainBranch()), null, [AbstractNormalizer::ATTRIBUTES => ['name','sha']]));
    }

    public function GitRepoCommit($repo){
        //returns a commit instance of the current head of a specified repo
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $repo = ($this->GitRepoUse($repo));
        $serializer = new Serializer($normalizers, $encoders);
        return var_dump($repo-> getCommit());   
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


