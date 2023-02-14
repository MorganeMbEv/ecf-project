<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\TimeOfTheDay;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text'
            ])
            ->add('phoneNumber', TelType::class, [
                'label' => 'Numéro de téléphone'
            ])
            ->add('emailAdress', EmailType::class, [
                'label' => 'Adresse e-mail'
            ])
            ->add('guestNumber', ChoiceType::class, [
                'label' => 'Nombre de couverts',
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                ],
            ])
            ->add('timeOfTheDay', EntityType::class, [
                'class'=> TimeOfTheDay::class,
                'label' => 'Heure de la réservation',
                'choice_label' => 'name',
                'mapped' => false,
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
