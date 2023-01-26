<?php

namespace App\Controller\Admin;

use App\Entity\MaxCustomers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MaxCustomersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MaxCustomers::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
