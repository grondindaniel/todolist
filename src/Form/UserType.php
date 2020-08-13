<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array('label'=>'Nom d\'utilisateur'))
            ->add('role', ChoiceType::class, array(
                'label'=>'Choisir le rôle',
                'choices'=>array(
                    'Utilisateur'=>'ROLE_USER',
                    'Administrateur'=>'ROLE_ADMIN'
                )
            ))
            ->add('email', EmailType::class, array('label'=>'email'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
