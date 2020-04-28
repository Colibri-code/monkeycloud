<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\User;
use App\Repository\UserRespository;

class UserApiController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('user_api/index.html.twig');
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
        $prueba = $data->prueba;
        $this->userRepository->saveUser($userName, $roles, $email, $password);
        return new JsonResponse(['status' => 'User created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/users", name="getUsersAction",methods="GET")
     */
    public function getUsersAction(): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();

        if (!$users) {
            throw new HttpException(400, "Invalid data");
        }

        return $users;
    }

	/**
	 * @Route("/user/{id}", name="getUserAction", methods="GET")
     */
    public function getUserAction(int $id): ? User
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

    $data = [
        'userName' => $user->setUsername(),
        'roles' => $user->setRoles(),
        'email' => $user->getEmail(),
        'password' => $user->setPassword(),
    ];

    return new JsonResponse($data, Response::HTTP_OK);
	}

	/**
	 * @Route("user/{id}", name="putUserAction", methods="PUT")
	 */
    public function putUserAction(Request $request, int $id): ? User
    {
        
    $user = $this->userRepository->findOneBy(['id' => $id]);
    $data = json_decode($request->getContent(), true);

    empty($data['userName']) ? true : $user->setFirstName($data['userName']);
    empty($data['roles']) ? true : $user->setLastName($data['roles']);
    empty($data['email']) ? true : $user->setEmail($data['email']);
    empty($data['password']) ? true : $user->setPhoneNumber($data['password']);

    $updatedUser = $this->userRepository->updateUser($user);

    return new JsonResponse($updatedUser->toArray(), Response::HTTP_OK);
    }

	/**
	 * @Route("/user/{id}", name="deleteUserAction", methods="DELETE")
	 */
    public function deleteUserAction(int $id): ? JsonResponse
    {
    $user = $this->userRepository->findOneBy(['id' => $id]);

    $this->userRepository->removeUser($user);

    return new JsonResponse(['status' => 'User deleted'], Response::HTTP_NO_CONTENT);
    }   
}
