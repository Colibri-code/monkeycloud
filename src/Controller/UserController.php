<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    private $UserRepository;
    public function __construct(UserRepository $UserRepository){
        $this->UserRepository = $UserRepository;

    }

    
    /**
     * @Route("/user/", name="user", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $email = $data['email']; 
        $password = $data['password'];
        $FullName = $data['FullName'];
        $UserName = $data['UserName'];
        $IsVisible = $data['IsVisible'];

        if(empty($email) || empty($password)||empty($FullName) || empty($UserName) || empty($IsVisible)){

                throw new NotFoundHttpException('Expectig mandatory parameters!');

        }

        $this->UserRepository->newUser($email,$password,$FullName,$UserName,$IsVisible);

        return new JsonResponse(['status' => 'Success'], Response::HTTP_CREATED);

    }   
}
