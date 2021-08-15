<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modCountryManip extends Model
{
    use HasFactory;
    //check for tableExists
    private function tableExists($name){
        if(!Schema::hasTable($name)){
            return true;
        }
        else{
            return false;
        }
    }

    //creates new table
    public function create($name){
        if (this.tableExists($name)) {
            Schema::create($name, function(Blueprint $name)
            {
                $table->increments('IP', 20);
                $table->string('DNS', 20);
                $table->int('Col1', 20);
                $table->int('col2', 20);
                $table->string('countryCode', 3)->unique();
                $table->string('county', 60);
                $table->rememberToken();
                $table->timestamps();
            });
            
            $url ='https://php-dev-task.s3-eu-west-1.amazonaws.com/GeoIPCountryCSV.zip';
            $content = this.downloadContent($url);        
        }


        
    }

    //select recodes by given Column
    public function select($table, $column, $value){
        $results = DB::select('select * from '.$table.' where '.$column.' = '.value);

        return $results;
    }

    //insert ner row into dbase
    public function insert($table, $ip, $dns, $col1, $col2, $countryCode, $country){
        $results = DB::insert([
            'ip' => $ip,
            'dns' => $dns,
            'col1' => $col1,
            'col2' => $col2,            
            'countryCode' => $countryCode,            
            'country' => $country,        
        ]);

        return $results;

    }

    //updates existing row
//    public function update($table, $ip, $dns, $col1, $col2, $countryCode, $country){
//    /*    $results = DB::update('update '.$table.' set ip' => $ip,
//            'dns' => $dns,
//            'col1' => $col1,
//            'col2' => $col2,            
//            'countryCode' => $countryCode,            
//            'country' => $country        
//        'where ip = '.$ip );
//
//        return $results;*/
//
//    }
    
  //  use HasFactory;
}
