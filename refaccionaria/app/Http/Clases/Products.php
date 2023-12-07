<?php
namespace App\Http\Clases;
use Illuminate\Database\Eloquent\Model;
use App\Models\Types;

class Products extends Model{
    private $id;

    private $local;
    private $name;
    private $slug;
    private $tipo;
    private $img;
    private $price;
    private $stock;
    private $stock_min;
    private $stock_max;
    private $desciption;
    private $content;

    public function __construct($id, $local, $name,$slug,$tipo, $img, $price, $stock, $stock_min, $stock_max, $desciption, $content){
        $this->id = $id;
        $this->local = $local;
        $this->name = $name;
        $this->slug = $slug;
        $this->tipo = $tipo;
        $this->img = $img;
        $this->price = $price;
        $this->stock = $stock;
        $this->stock_min = $stock_min;
        $this->stock_max = $stock_max;
        $this->desciption = $desciption;
        $this->content = $content;
    }
    public function getId(){
        return $this->id;
    }

    public function getLocal(){
        return $this->local;
    }

    public function getName(){
        return $this->name;
    }
    public function getSlug(){
        return $this->slug;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getImg(){
        return $this->img;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getStockMin(){
        return $this->stock_min;
    }
    public function getStockMax(){
        return $this->stock_max;
    }
    public function getDesciption(){
        return $this->desciption;
    }
    public function getContent(){
        return $this->content;
    }
}