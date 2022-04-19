<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BookForm extends Form
{
    public function buildForm()
    {


        $this
            ->add('title', 'text')
            ->add('description', 'text')
            ->add('page_number', 'number');

            if ($this->getData('is_admin') == true){
                $this->add('prezzo', 'number');

            }

           ($this->getModel() == null) ? $this->add('submit', 'submit', [
                'attr' => ['class' => 'btn btn-dark'],
                'label' => 'crea' ]) : 
                
                $this->add('submit', 'submit', [
                    'attr' => ['class' => 'btn btn-info'],
                    'label' => 'modifica' ]);
    }
    
}
