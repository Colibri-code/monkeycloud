<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\LanguagesRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class LanguagesController extends AbstractController
{
    private $LanguagesRepository;
    public function __construct(LanguagesRepository $LanguagesRepository)
    {
        $this->LanguagesRepository = $LanguagesRepository;
    }

    /**
     * @Route("/new/language/", name="add_language", methods={"POST"})
     */
     public function add(Request $Request): JsonResponse
     {
        $data = json_decode($Request->getContent(), true);
        $language = $data['language'];

        if(empty($language)){
            return new NotFoundHttpException('Expectig mandatory parameters!');
        }

        $this->LanguagesRepository->newLanguage($language);

        return new JsonResponse(['status' => 'Success'], Response::HTTP_CREATED);
     }

     /**
     * @Route("/show/language/{id}", name="show_language", methods={"GET"})
     */
     public function showLanguage(int $id){
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $shownLanguage = $this->LanguagesRepository->findOneBy(['id' => $id]);

        $serializer = new Serializer($normalizers, $encoders);


        $data = $serializer->serialize($shownLanguage, 'json');

        return new JsonResponse(json_decode($data), Response::HTTP_OK);
     }


}
