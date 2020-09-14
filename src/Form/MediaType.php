<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Creator;
use App\Entity\ExtendedInformation;
use App\Entity\Media;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre du média'
            ])
            ->add('description')
            ->add('releaseDate', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ])
            ->add('creator', EntityType::class, [
                'class' => Creator::class,
                'choice_label' => function($creator) {
                        // Christopher Nolan (réalisateur)
                        return $creator->getFullname() . ' (' . $creator->getJob()->getTitle() . ')';
                }
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'title',
                'multiple' => true
            ])
            ->add('informations', ExtendedInformationType::class, [
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
