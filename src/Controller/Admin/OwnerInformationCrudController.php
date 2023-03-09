<?php

namespace App\Controller\Admin;

use App\Entity\OwnerInformation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OwnerInformationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OwnerInformation::class;
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
