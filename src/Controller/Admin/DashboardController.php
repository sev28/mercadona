<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Category;
use App\Entity\Products;
use App\Entity\Promotion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mercadona');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Menu', 'fa fa-home');
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Promotion', 'fas fa-list', Promotion::class);
        yield MenuItem::linkToCrud('Admin', 'fas fa-users', Admin::class);
        
    }
}
