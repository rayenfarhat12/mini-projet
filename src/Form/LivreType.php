<?php

namespace App\Form;

use App\Entity\Livre;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('nbPages')
            ->add('dateEdition')
            ->add('nbExemplaires')
            ->add('prix', NumberType::class,['attr'=>['value'=>0]])
            ->add('isbn', NumberType::class,['attr'=>['placeholder'=>'ISBN sur 8 chiffres']])
            ->add('editeur')
            ->add('categorie')
            ->add('auteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
