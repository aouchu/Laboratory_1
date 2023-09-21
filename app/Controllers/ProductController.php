<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    private $product;
    private $category;

    //used to get data from database
    public function __construct()
    {
        $this->category = new \App\Models\ProductCategory();
        $this->product = new \App\Models\ProductModel();
    }

    //saving
    public function save_p()
    {
        $id = $_POST['ID'];
        $data = [
        'ProductName' => $this->request->getVar('ProductName'),
        'ProductDescription' => $this->request->getVar('ProductDescription'),
        'ProductCategory' => $this->request->getVar('ProductCategory'),
        'ProductQuantity' => $this->request->getVar('ProductQuantity'),
        'ProductPrice' => $this->request->getVar('ProductPrice'),
        ];
        if($id != null){
            $this->product->set($data)->where('ID', $id)->update();

        }else{
            $this->product->save($data);
        }
    return redirect()->to('/product');
    }

    //updating
    public function edit_p($id)
    {
        $data = [
        'product' => $this->product->FindAll(),
        'pro' => $this->product->where('ID', $id)->first(),    
        'category' => $this->category->distinct()->FindAll(),    
    ];
        return view('products', $data);
    }

    //deleting
    public function delete_p($id)
    {
        $this->product->delete($id);
        return redirect()->to('/product');
    }

    //passing data to views
    public function index()
    {
        $data = [
            'product' => $this->product->FindAll(),
            'category' => $this->category->distinct()->FindAll(),
    ];
        return view('products', $data);
    }

    //saving for category
    public function save_c()
    {
        $id = $_POST['ID'];
        $data = [
        'ProductCategory' => $this->request->getVar('ProductCategory'),
        ];
        if($id != null){
            $this->category->set($data)->where('ID', $id)->update();

        }else{
            $this->category->save($data);
        }
    return redirect()->to('/product');
    }

    public function edit_c($id)
    {
        $data = [
        'category' => $this->category->distinct()->FindAll(),
        'product' => $this->product->FindAll(),
        'categ' => $this->category->where('ID', $id)->first(),        
    ];
        return view('products', $data);
    }

    //deleting
    public function delete_c($id)
    {
        $this->category->delete($id);
        return redirect()->to('/product');
    }

    public function product($product)
    {
        echo $product;
    }

    public function  category($category)
    {
        echo $category;
    }


}
