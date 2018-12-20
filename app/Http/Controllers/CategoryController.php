<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class CategoryController extends Controller
{
    public function index()
    {
        
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $headers = getallheaders();
        $token = $headers['Authorization'];
        $key = '7kvP3yy3b4SGpVz6uSeSBhBEDtGzPb2n';
        $userData = JWT::decode($token, $key, array('HS256'));

        if ($this->checkLogin($userData->email , $userData->password)) 
        { 
            $category = new Category();
            $category->name = $request->categoryName;
            $category->id_user = $userData->id;
            $category->save();

            //$data = ['category' => $category->categoryName];
            return $this->success('Categoría creada', $request->categoryName);
        }
        else
        {
            return $this->error(401, "No tienes permisos");
        }


        
    }

    
    public function show()
    {
        
    }

    
    public function edit(Category $category)
    {
        
    }

    
    public function update(Request $request, Category $category)
    {
        
    }

    
    public function destroy(Category $category)
    {
        
    }
}
