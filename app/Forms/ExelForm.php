<?php

namespace App\Forms;

use App\Models\Category;
use Kris\LaravelFormBuilder\Form;

class ExelForm extends Form
{
    public function buildForm()
    {
    

        $this
            ->add('exelFile', 'file');
            $this->add('submit', 'submit', [
                'attr' => ['class' => 'btn btn-success'],
                'label' => 'invia'
            ]);
    }
}
