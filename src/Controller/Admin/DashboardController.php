<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use App\Entity\MaxCustomers;
use App\Entity\OpeningHours;
use App\Entity\Picture;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(DishCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Plateforme Admin - Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Page d\'accueil', 'fa fa-home', 'app_homepage');
        yield MenuItem::linkToCrud('Plats', 'fas fa-map-marker-alt', Dish::class);
        yield MenuItem::linkToCrud('Horaires d\'ouverture', 'fas fa-map-marker-alt', OpeningHours::class);
        yield MenuItem::linkToCrud('Maximum clients', 'fas fa-map-marker-alt', MaxCustomers::class);
        yield MenuItem::linkToCrud('Galerie d\'image', 'fas fa-map-marker-alt', Picture::class);
    }
}
