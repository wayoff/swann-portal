<?php
namespace App\SwannPortal\Decorators;
use App\Models\Keyword;

class KeywordSwitcher
{
    protected $keyword;

    function __construct(Keyword $keyword)
    {
        $this->keyword = $keyword;
    }

    public function handle()
    {
        return $this->collect();
    }

    protected function collect()
    {
        $collections = collect();

        foreach($this->keyword->products as $product):
            $collections->push(new KeywordProduct($product));
        endforeach;


        foreach($this->keyword->procedures as $procedure):
            $collections->push(new KeywordProcedure($procedure));
        endforeach;


        foreach($this->keyword->questions as $question):
            $collections->push(new KeywordQuestion($question));
        endforeach;

        return $collections;
    }
}