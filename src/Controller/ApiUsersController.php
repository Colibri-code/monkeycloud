<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\SignUp;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiUsersController extends AbstractController
{
    /**
     * @Route("api/user", name="api_user")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */
    public function SetUser(Request $request, EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $signUp = new SignUp();
        $signUp->setUsername($request->request->get('userName'));
        $signUp->setEmail($request->request->get('email'));
        $signUp->setPassword($request->request->get('password'));
        // if you want to pass the SignUp class to Validator use
        // $errors = $validator->validate($signUp);
        // but you need to customize the errors to return below, dump($errors); for more info
        $usernameError = $validator->validateProperty($signUp, 'userName');
        $emailError = $validator->validateProperty($signUp, 'email');
        $passwordError = $validator->validateProperty($signUp, 'password');
        $formErrors = [];
        if(count($usernameError) > 0) {
            $formErrors['usernameError'] = $usernameError[0]->getMessage();
        }
        if(count($emailError) > 0) {
            $formErrors['emailError'] = $emailError[0]->getMessage();
        }
        if(count($passwordError) > 0) {
            $formErrors['passwordError'] = $passwordError[0]->getMessage();
        }
        if($formErrors) {
            return new JsonResponse($formErrors);
        }
        $user = new User();
        $user->setUsername($signUp->getUsername());
        $user->setEmail($signUp->getEmail());
        $user->setPassword($signUp->getPassword());
        $em->persist($user);
        $em->flush();
        return new JsonResponse([
            'success_message' => 'Thank you for registering'
        ]);
    }
}