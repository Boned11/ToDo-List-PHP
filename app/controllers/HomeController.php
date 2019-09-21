<?php
namespace App\controllers;

use App\models\QueryBuilder;


    class HomeController
    {

        public function index()
        {
            $db = new QueryBuilder();
            include "../index.php";
        }

        public function create()
        {

            include "../create.php";
        }

        public function store()
        {
            $db = new QueryBuilder();
            include "../store.php";
        }

        public function show($id)
        {
            $id = $id['id'];
            $db = new QueryBuilder();
            include "../show.php";
        }

        public function edit($id)
        {
            $id = $id['id'];
            $db = new QueryBuilder();
            include "../edit.php";
        }

        public function update($id)
        {
            $id = $id['id'];
            $db = new QueryBuilder();
            include "../update.php";
        }

        public function delete($id)
        {
            $id = $id['id'];
            $db = new QueryBuilder();
            include "../delete.php";
        }
    }
