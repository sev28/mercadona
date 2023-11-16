<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Products;
use App\Form\ProductsType;
use App\Form\SearchForm;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/products')]
class ProductsController extends AbstractController
{
    #[Route('/', name: 'app_products_index', methods: ['GET'])]
    public function index(ProductsRepository $repository, Request $request, PaginatorInterface $paginator, ProductsRepository $productsRepository): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        }
        $data = $repository->findSearch($data);
        $pagination = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('products/index.html.twig', [
            'products' => $productsRepository->findAll(),
            'form' => $form->createView(),
            'pagination' => $pagination
        ]);
        
    }

    
}
