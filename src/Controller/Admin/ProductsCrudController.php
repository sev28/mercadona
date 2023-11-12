<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       
        
            yield TextField::new('title');
            yield TextareaField::new('description'); 
            yield NumberField::new('price');
            yield AssociationField::new('category');
            yield TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
            yield ImageField::new('image')->setBasePath('/uploads/images')->onlyOnIndex();
            yield AssociationField::new('promotion');
          
           
          
          
           

        
    }
    
}
