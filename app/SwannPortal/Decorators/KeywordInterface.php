<?php
namespace App\SwannPortal\Decorators;

use Illuminate\Database\Eloquent\Model;

interface KeywordInterface {
    public function __construct(Model $model);
    public function products();
    public function title();
    public function description();
    public function icon();
}