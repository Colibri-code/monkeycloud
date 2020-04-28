<?php

namespace App\Service;

use symfony\Component\HttpFoundation\Response;
use symfony\Component\Routing\Annotation\Route;
use GitElephant\Repository;



class GitFlow
{

    /**
     * @Route("/git/ejemplo", name="app_git")
     */
    public function mostrando(){
        $estado = Repository::open('/home/dandida/Escritorio/monkeycloud/prueba_repositorios/pruebas_raras');

        $estado -> getStatusOutput();
        return new response('$mostrando');
    }

}


?>
