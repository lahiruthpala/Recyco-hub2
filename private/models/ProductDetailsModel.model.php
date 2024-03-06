<?php


class ProductDetailsModel extends Model
{
    protected $table = "products";

    public function all()
    {
      
        $query = "SELECT * FROM $this->table";

       
        return $this->query($query);
    }
    
}