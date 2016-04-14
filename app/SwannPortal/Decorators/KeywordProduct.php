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

        $description.= '<br />Description: ' . str_limit($this->product->description, 150);

        return $description;
    }

    public function icon()
    {
        return 'P';
    }
}