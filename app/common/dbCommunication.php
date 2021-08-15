<?php

namespace App\common;

/**
 * this class is used to handle all dbase communcations
 * including SELECT, INSERT, UPDATE & DELETE 
 * requirements.
 */
class dbCommunication {

    //check for tableExists
    private function tableExists($name){
        if(!Schema::hasTable($name)){
            return true;
        }
        else{
            return false;
        }
    }
    
   //downloads zip file from a given endpoint and unzips it
    //then returns the contents as array.
    private function downloadContents($url) {
        $content = file_get_contents($url);
    
        //path to temp file
        $path = tempnam(sys_get_temp_dir(), 'tmp');
    
        $temp = fopen($path, 'w');
        fwrite($temp, $content);
        fseek($temp, 0);
        fclose($temp);
    
        $pathExtracted = tempnam(sys_get_temp_dir(), 'tmp');
    
        $tmpfilename = 'temp.csv';
        copy("zip://".$path."#".$tmpfilename, $pathExtracted);
    
        $zipfiledata = file_get_contents($pathExtracted);
    
        unlink($path);
        unlink($pathExtracted);
    
        return $zipfiledata;
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
        }

        $url ='https://php-dev-task.s3-eu-west-1.amazonaws.com/GeoIPCountryCSV.zip';
        $content = $this->downloadContent($url);
        
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
    public function update($table, $ip, $dns, $col1, $col2, $countryCode, $country){
    /*    $results = DB::update('update '.$table.' set ip' => $ip,
            'dns' => $dns,
            'col1' => $col1,
            'col2' => $col2,            
            'countryCode' => $countryCode,            
            'country' => $country        
        'where ip = '.$ip );

        return $results;*/

    }


}

