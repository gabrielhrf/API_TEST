<?php

    namespace App\Services;
    use App\Models\Compra;

    class CompraService
    {
        public function get($id = null){
            return Compra::selectAll();            
        }

        public function post(){
           return Compra::insert($_POST);
        }

        public function update(){
        }

        public function delete(){
            
        }
    }
