<?php

namespace App\Forms;

use App\Models\Category;
use Kris\LaravelFormBuilder\Form;

class BookForm extends Form
{
    public function buildForm()
    {
    
        $category = Category::all();

        $this
            ->add('title', 'text')
            ->add('description', 'text')
            ->add('page_number', 'number')
            ->add('category', 'select', [
                'choices' => $category->pluck('name','id')->toArray(),
                'empty_value' => '=== Select category ==='
            ])
            ->add('bookImage', 'file');


          /*  foreach ($this->getData('categories') as $data) {
               
                $this->modify('category', 'select', [
                    'choices' => [$data->id => $data->name],
                    'empty_value' => '=== Select category ==='
                ]);
    
                
            }  */


        if ($this->getData('is_admin') == true) {
            $this->add('prezzo', 'number');
        }

        ($this->getModel() == null) ? $this->add('submit', 'submit', [
            'attr' => ['class' => 'btn btn-dark'],
            'label' => 'crea'
        ]) :

            $this->add('submit', 'submit', [
                'attr' => ['class' => 'btn btn-info'],
                'label' => 'modifica'
            ]);
    }
}
