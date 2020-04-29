<?php

namespace App\Controller;

use App\Service\GitRepo;
use Symfony\Component\HttpFoundation\Response;
use symfony\Component\Routing\Annotation\Route;


class GitFlowController
{

    /**
     * @Route("/git/ejemplo", name="app_git")
     */
    public function showGit(){
        

        $showGit = new GitRepo;
        $showGitBranches = $showGit->GitRepoMainBranch('../');
        
        return new Response(
            '<html><body>Git Status: '. print_r($showGitBranches).'</body></html>'
        );
    }

}
