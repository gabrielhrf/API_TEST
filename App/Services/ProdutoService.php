<?php

    namespace App\Services;
    use App\Models\Produto;

    class ProdutoService
    {
        public function get($id = null){
            if($id)
            {
                return Produto::select($id);
            }else{
                return Produto::selectAll();
            }
        }

        public function post(){
           return Produto::insert($_POST);
        }

        public function update(){
        }

        public function delete(){
            
        }
    }