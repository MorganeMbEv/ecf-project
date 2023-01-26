<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\OpeningHours;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
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
            ->add('guestNumber', NumberType::class, [
                'label' => 'Nombre de couverts'
            ])
            ->addEventListener(
                FormEvents::PRE_SUBMIT,
                function (FormEvent $event) {
                    $date = $event->getData();
                    $form = $event->getForm();
                    
                }
            )
            ->add('hours', EntityType::class, [
                'class' => OpeningHours::class,
                'label' => 'Heures réservation',
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
