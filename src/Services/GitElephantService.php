<?php


namespace App\Service;

use GitElephant\Repository;
use GitElephant\Objects\Log;
use Symfony\Bridge\Doctrine\DataCollector\ObjectParameter;
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
        // returns branch instance of current checked out branch
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $repo = ($this->GitRepoUse($repo));
        $serializer = new Serializer($normalizers, $encoders);
        return json_encode($serializer->normalize(($repo -> getBranch($branch)), null, [AbstractNormalizer::ATTRIBUTES => ['name','sha']]));
    }

    public function GitRepoCommit($repo){
        //returns a json  containing information of the current head of a specified repo
        $repo = ($this->GitRepoUse($repo));
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->enableExceptionOnInvalidIndex()
            ->enableExceptionOnInvalidPropertyPath()
            ->getPropertyAccessor();
        
        $repoObject = ($propertyAccessor->getValue($repo->getCommit(),'repository'));    
        $callerObject = $propertyAccessor->getValue($repoObject,'caller');
        return json_encode($propertyAccessor->getValue($callerObject, 'OutputLines'));

    }

    public function GitRepoCommitSHA($repo,$sha){
        //returns a commit instance of specified sha from a specified repo 
        $repo = ($this->GitRepoUse($repo));
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
        ->enableExceptionOnInvalidIndex()
        ->enableExceptionOnInvalidPropertyPath()
        ->getPropertyAccessor();
    
    $repoObject = ($propertyAccessor->getValue($repo -> getCommit($sha),'repository'));    
    $callerObject = $propertyAccessor->getValue($repoObject,'caller');
        return json_encode($propertyAccessor->getValue($callerObject, 'OutputLines'));

    }

    public function GitRepoCommitByTag($repo,$tag){
        // returns commit instance for a tag in a specified repo
        $repo = ($this->GitRepoUse($repo));
        return $repo-> getCommit($tag);

    }

    public function GitRepoTags($repo){
        // returns array of tag instances

        $repo = ($this->GitRepoUse($repo));
        $encoders = [new jsonEncoder, new XmlEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        return json_encode($serializer->normalize($repo->getTags(),null,[AbstractNormalizer::ATTRIBUTES=>['name','fullRef','sha']]));
    }
    
    public function GitRepoTag($repo,$tag){
        // returns a tag instance by name
        $repo = ($this->GitRepoUse($repo));
        $encoders = [new jsonEncoder, new XmlEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        return json_encode($serializer->normalize($repo->getTag($tag),null,[AbstractNormalizer::ATTRIBUTES=>['name','fullRef','sha']]));
          
        
    }

    public function GitRepoLastTag($repo){
        //returns last tag by date
        $repo = ($this->GitRepoUse($repo));
        $encoders = [new jsonEncoder, new XmlEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        return json_encode($serializer->normalize($repo->getLastTag(),null,[AbstractNormalizer::ATTRIBUTES=>['name','fullRef','sha']]));
    }

    public function GitRepoLogs($repo){
        // returns array containing strings from the log of a repo
        $repo = ($this->GitRepoUse($repo));
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
        ->enableExceptionOnInvalidIndex()
        ->enableExceptionOnInvalidPropertyPath()
        ->getPropertyAccessor();
        
        $logObject = $propertyAccessor->getValue($repo->getLog(), 'repository');
        $callerObject = $propertyAccessor->getValue($logObject, 'caller');
        //json_encode($propertyAccessor->getValue($logObject, 'outputLines'));
        return json_encode($propertyAccessor->getValue($callerObject, 'outputLines'));
    }

    public function GitRepoLog($repo, $limit,$branch){
        // returns array containing strings from the log of a repo from last commit of a branch to specified limit
        $repo = ($this->GitRepoUse($repo));
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
        ->enableExceptionOnInvalidIndex()
        ->enableExceptionOnInvalidPropertyPath()
        ->getPropertyAccessor();
        

        $logObject = $propertyAccessor->getValue($repo->getLog($branch, null, $limit), 'repository');
        $callerObject = $propertyAccessor->getValue($logObject, 'caller');
        //json_encode($propertyAccessor->getValue($logObject, 'outputLines'));
        return json_encode($propertyAccessor->getValue($callerObject, 'outputLines'));
    }



}


