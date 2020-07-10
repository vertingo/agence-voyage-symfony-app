<?php

namespace App\Form;

use App\Entity\Vole;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('heurdepart')
            ->add('heurearrive')
            ->add('compagnie')
            ->add('aeroport_depart')
            ->add('aeroport_arrive')
            ->add('avion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vole::class,
        ]);
    }
}
