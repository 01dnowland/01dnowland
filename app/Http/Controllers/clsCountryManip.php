<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\modCountryManip;

class clsCountryManip extends Controller
{
    public function create() {
         $createDB = modCountryManip::create('testDB');
    }

}