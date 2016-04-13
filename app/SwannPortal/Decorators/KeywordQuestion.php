<?php
namespace App\SwannPortal\Decorators;
use Illuminate\Database\Eloquent\Model;

class KeywordQuestion implements KeywordInterface
{
    protected $question;
    
    public function __construct(Model $question)
    {
        $this->question = $question;
    }

    public function products() 
    {
        return $this->question->products;
    }

    public function title()
    {
        return $this->question->title;
    }

    public function description()
    {
        $description = 'Answer: ' . $this->question->anwer;

        return $description;
    }
}