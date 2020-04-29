<?php

namespace App\Controller;

use App\Service\GitRepo;
use Symfony\Component\HttpFoundation\Response;
use symfony\Component\Routing\Annotation\Route;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;


class GitFlowController
{

    /**
     * @Route("/git/ejemplo", name="app_git")
     */
    public function showGit(){

        $showGit = new GitRepo;
        $showGitBranches = $showGit->GitRepoBranches('../');
        $reflectionExtractor = new ReflectionExtractor();
        $phpDocExtractor = new PropertyInfoExtractor(
            [$reflectionExtractor,
                ]
        );

        $properties = $phpDocExtractor->getProperties(get_class($showGitBranches['0']->getRepository()->getCaller()));

        return new Response(
            '<html><body>Git Status: '. print_r($properties).'</body></html>'

        );
    }

}
