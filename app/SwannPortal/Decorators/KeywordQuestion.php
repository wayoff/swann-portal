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
        $description = $this->question->anwer;

        return $description;
    }

    public function icon()
    {
       return '?'; 
    }

    public function file()
    {
        return $this->question->document_id
            ? $this->question->document->getDocument()
            : null;
    }
}