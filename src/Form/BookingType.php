<?php

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\Booking;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
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
                'widget' => 'single_text',

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
            ->add('allergies', EntityType::class, [
                'class' => Allergy::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('time', TimeType::class, [
                'label' => 'Heure de la réservation',
                'input'  => 'datetime',
                'widget' => 'choice',
                'hours' => [
                    12, 13, 19, 20, 21
                ],
                'minutes' => [
                    0, 15, 30, 45
                ]
            ])
           // ->add('time', EntityType::class, [
           //     'class' => OpeningHours::class,
           //     'label' => 'Heure de la réservation',
           //     'choice_label' => 'lunchOpening',
           //     'placeholder' => 'Choisissez une heure',
           // ])
        ;
        //$builder->get('time')
        //    ->addModelTransformer(new CallbackTransformer(
        //        function ($timeToString) {
        //            // transform the DateTime to a string
        //            return date_format(new DateTime($timeToString),'H:i');
        //        },
        //        function ($timeToDateTime) {
        //            // transform the string back to a DateTime
        //            $time = strtotime($timeToDateTime);
        //            return date('H:i:s', $time);
        //        }
        //    ))
        //;
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
