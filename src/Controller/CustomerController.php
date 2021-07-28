<?php

namespace App\Controller;
use App\Model\CustomerModel;
use App\Entity\Customers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends AbstractController
{
    #[Route('/customer_list', name: 'customer_list', methods:'get|post')]

    public function listAll(Request $Request): Response
    {
        $country = $Request->get('country') ?? '';

        $customerModel = new CustomerModel();

        $customers = $customerModel->findByCountry($country);
        
        return $this->render('customer/customer.html.twig', [
            'customers' => $customers,
            'country' => $country
        ]);
    }

    #[Route('/doctrine', name: 'customer_list_with_doctrine', methods:'get|post')]

    public function listAllWithORM(Request $Request): Response
    {
        $country = $Request->get('country') ?? '';

        $entityManager = $this->getDoctrine()->getManager();
        $customers = $entityManager->getRepository(Customers::class)->findBy(['country'=>$country]);

        return $this->render('customer/customer.html.twig', [
            'customers' => $customers,
            'country' => $country
        ]);
    }

}
