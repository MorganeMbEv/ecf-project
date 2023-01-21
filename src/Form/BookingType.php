<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName')
            ->add('date')
            ->add('phoneNumber')
            ->add('emailAdress')
            ->add('guestNumber')
            ->add('bookingTime', ChoiceType::class, [
                'choices' => [
                    '12h00' => '12:00',
                    '12h15' => '12:15',
                    '12h30' => '12:30',
                    '12h45' => '12:45',
                    '13h00' => '13:00',
                    '13h15' => '13:15',
                    '13h30' => '13:30',
                    '19h00' => '19:00',
                    '19h15' => '19:15',
                    '19h30' => '19:30',
                    '19h45' => '19:45',
                    '20h00' => '20:00',
                    '20h15' => '20:15',
                    '20h30' => '20:30',
                    '20h45' => '20:45',
                    '21h00' => '21:00'

                ],
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
