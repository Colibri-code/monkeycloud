<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\CompanyRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CompanyController extends AbstractController
{
    
            
    private $CompanyRepository;
    public function __construct(CompanyRepository $CompanyRepository){
        $this->CompanyRepository = $CompanyRepository;

    }
    
    /**
     * @Route("/new/company/", name="add_company", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $CompName = $data['CompName'];
        $Departments = $data['Departments'];
        $Teams = $data['Teams'];

        if(empty($CompName) || empty($Departments) || empty($Teams)){
            
            return new NotFoundHttpException('Expecting mandatory parameters!');

        }

        $this->CompanyRepository->newCompany($CompName, $Departments, $Teams);

        return new JsonResponse(['status' => 'Success'], Response::HTTP_CREATED);

    }

    /**
     * @Route("/show/company/{id}", name="show_company", methods={"GET"})
     */
     public function show(int $id): JsonResponse
     {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $companyShown = $this->CompanyRepository->findOneBy(['id' => $id]);

        $serializer = new Serializer($normalizers, $encoders);


        $data = $serializer->serialize($companyShown, 'json');

        return new JsonResponse(json_decode($data), Response::HTTP_OK);
        
     }
    /** 
    * @Route("/update/company/{id}", name="modify_company", methods={"PUT"})
    */
    public function update(int $id, Request $request): Response
    {
        $company = $this->CompanyRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);
        
        empty($data['CompName']) ? true : $company->setCompName($data['CompName']);
        empty($data['Departments']) ? true : $company->setDepartments($data['Departments']);
        empty($data['Teams']) ? true : $company->setTeams($data['Teams']);

        $updatedCompany = $this->CompanyRepository->updateCompany($company);

        return new JsonResponse(["status" => "updated"], Response::HTTP_OK);

    }


    /**
     * @Route("/delete/company/{id}", name="delete_company", methods={"DELETE"})
     */
     public function delete(int $id){

        $Company = $this->CompanyRepository->findOneBy(['id' => $id]);

        $this->CompanyRepository->deleteCompany($Company);

        return new JsonResponse([ 'status' => 'deleted!'], Response::HTTP_OK);

    }



}
