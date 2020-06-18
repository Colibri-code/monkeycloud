<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\SignUpRepository;

class SignUpController extends AbstractController
{
    private $SignUpRepository;

    public function __construct(SignUpRepository $SignUpRepository)
        {
            $this->SignUpRepository = $SignUpRepository;
        }
        
        /**
        * @Route("/signup/", name="add_signup", methods={"POST"})
        */
        public function add(Request $request): JsonResponse
        {
            $data = json_decode($request->getContent(), true);

            $email= $data['email'];
            $password = $data['password'];
            $FullName = $data['FullName'];

            if(empty($email)||empty($password)||empty($FullName)){
                throw new NotFoundHttpException('Expecting mandatory parameters!');
            }
            
        $this->SignUpRepository->saveSignUp($email, $password, $FullName);
            
        return new JsonResponse(['message' => 'Success'], Response::HTTP_Created);
        }
    
}
