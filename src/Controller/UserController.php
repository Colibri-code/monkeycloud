<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $email = $data['email']; 
        $password = $data['password'];
        $FullName = $data['FullName'];
        $UserName = $data['UserName'];

        if(empty($email) || empty($password)||empty($FullName) || empty($UserName) ){

                throw new NotFoundHttpException('Expectig mandatory parameters!');

        }

        $this->UserRepository->newUser($email,$password,$FullName,$UserName);

        return new JsonResposne(['status' => 'Success'], Response::HTTP_CREATED);

    }   
}
