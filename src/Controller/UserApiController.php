<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\User;
use App\Repository\UserRepository;

/**
 * Class UserApiController
 * @package App\Controller
 *
 * @Route(path="/user")
 */

class UserApiController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
   /**
     * @Route("/user", name="postUserAction", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function postUserAction(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $userName = $data['userName'];
        $roles = $data['roles'];
        $email = $data['email'];
        $password = $data['password'];

        if (empty($userName) || empty($roles) || empty($email) || empty($password)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->userRepository->saveUser($userName, $roles, $email, $password);

        return new JsonResponse(['status' => 'User created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/users", name="getUsersAction",methods="GET")
     * @param Request $request
     * @return JsonResponse
     */
    public function getUsersAction(): JsonResponse
    {
        $users = $this->userRepository->findAll();
        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'id' => $user->getId(),
                'userName' => $user->getUsername(),
                'roles' => $user->getRoles(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/get/{id}", name="getUserAction", methods="GET")
     * @param Request $request
     * @return JsonResponse
     */
    public function getUserAction(int $id): ? JsonResponse
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

        $data = [
            'userName' => $user->getUsername(),
            'roles' => $user->getRoles(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];
        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/update/{id}", name="putUserAction", methods="PUT")
     * @param Request $request
     * @return JsonResponse
     */
    public function putUserAction(Request $request, int $id): ? JsonResponse
    {
    $user = $this->userRepository->findOneBy(['id' => $id]);
    $data = json_decode($request->getContent(), true);

    empty($data['userName']) ? true : $user->setUsername($data['userName']);
    empty($data['roles']) ? true : $user->setRoles($data['roles']);
    empty($data['email']) ? true : $user->setEmail($data['email']);
    empty($data['password']) ? true : $user->setPassword($data['password']);

    $updatedUser = $this->userRepository->updateUser($user);

    return new JsonResponse(['status' => 'User updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("/delete/{id}", name="deleteUserAction", methods="DELETE")
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteUserAction(int $id): ? JsonResponse
    {
    $user = $this->userRepository->findOneBy(['id' => $id]);

    $this->userRepository->removeUser($user);

    return new JsonResponse(['status' => 'User deleted'], Response::HTTP_OK);
    }  

}
