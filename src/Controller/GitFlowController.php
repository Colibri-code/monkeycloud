<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use symfony\Component\Routing\Annotation\Route;

use GitElephant\Repository;

class GitFlowController
{

    /**
     * @Route("/git/ejemplo", name="app_git")
     */
    public function showGit(){
        $showGit = Repository::open('../');

        $showGit->getStatusOutput();
        return new Response(
            '<html><body>Git Status: '. print_r($showGit) .'</body></html>'
        );
    }

}
