<?php
namespace App\SwannPortal\Decorators;
use App\Models\Keyword;

class KeywordSwitcher
{
    protected $keyword;
    protected $products;
    protected $questions;
    protected $procedures;

    function __construct(Keyword $keyword, $products, $procedures, $questions)
    {
        $this->keyword = $keyword;
        $this->products = $products;
        $this->questions = $questions;
        $this->procedures = $procedures;
    }

    public function handle()
    {
        return $this->collect();
    }

    protected function collect()
    {
        $collections = collect();

        foreach($this->keyword->products as $product) :

            if ($this->products->where('id', $product->id)->first()) {
                continue;
            }

            $this->products->push([
                'id' => $product->id
            ]);

            $collections->push(new KeywordProduct($product));
        endforeach;


        foreach($this->keyword->procedures as $procedure):

            if ($this->procedures->where('id', $procedure->id)->first()) {
                continue;
            }

            $this->procedures->push([
                'id' => $procedure->id
            ]);

            $collections->push(new KeywordProcedure($procedure));
        endforeach;


        foreach($this->keyword->questions as $question):

            if ($this->questions->where('id', $question->id)->first()) {
                continue;
            }

            $this->questions->push([
                'id' => $question->id
            ]);

            $collections->push(new KeywordQuestion($question));
        endforeach;

        return [
            'products'   => $this->products,
            'procedures' => $this->procedures,
            'questions'  => $this->questions,
            'data'       => $collections
        ];
    }
}