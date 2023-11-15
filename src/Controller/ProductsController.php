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
    public function index(ProductsRepository $repository, Request $request, PaginatorInterface $paginator, ProductsRepository $productsRepository)
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $products = $repository->findSearch($data);
        $pagination = $paginator->paginate(
            $productsRepository->paginationQuery(),
            $request->query->get('page', 1),
            6
        );
        return $this->render('products/index.html.twig', [
            'products' => $products,
            'form' => $form->createView(),
            'pagination' => $pagination
        ]);
        
    }

    // #[Route('/new', name: 'app_products_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $product = new Products();
    //     $form = $this->createForm(ProductsType::class, $product);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($product);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_products_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('products/new.html.twig', [
    //         'product' => $product,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_products_show', methods: ['GET'])]
    // public function show(Products $product): Response
    // {
    //     return $this->render('products/show.html.twig', [
    //         'product' => $product,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_products_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Products $product, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(ProductsType::class, $product);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_products_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('products/edit.html.twig', [
    //         'product' => $product,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_products_delete', methods: ['POST'])]
    // public function delete(Request $request, Products $product, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
    //         $entityManager->remove($product);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_products_index', [], Response::HTTP_SEE_OTHER);
    // }
}
