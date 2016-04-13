<?php
namespace App\SwannPortal\Decorators;
use Illuminate\Database\Eloquent\Model;

class KeywordProduct implements KeywordInterface
{
    protected $product;

    public function __construct(Model $product)
    {
        $this->product = $product;
    }

    public function products() 
    {
        return $this->product;
    }

    public function title()
    {
        return $this->product->name;
    }

    public function description()
    {
        $description = 'Model: ' . $this->product->model_no . '</ br>';

        $description.= 'Description: ' . $this->product->description;

        return $description;
    }
}