<?php
namespace App\SwannPortal\Decorators;
use Illuminate\Database\Eloquent\Model;

class KeywordProcedure implements KeywordInterface
{
    protected $procedure;

    public function __construct(Model $procedure)
    {
        $this->procedure = $procedure;
    }

    public function products() 
    {
        return $this->procedure->products;
    }

    public function title()
    {
        return $this->procedure->name . ' . ' . $this->procedure->id;
    }

    public function description()
    {
        return '--';
    }

    public function icon()
    {
        return 'TS';
    }

    public function file()
    {
        return $this->procedure->document_id
            ? $this->procedure->document->getDocument()
            : null;
    }
}