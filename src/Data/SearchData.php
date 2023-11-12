<?php
namespace App\Data;

class SearchData 
{
    /**
     * @var string
     */
    public $q = '';
    /**
     * @var Category[]
     */
    public $categories = [];

    /**
     * @var boolean
     */
    public $promo = false;
}