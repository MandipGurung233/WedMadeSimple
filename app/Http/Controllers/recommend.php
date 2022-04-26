<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approved;
use App\Models\User;
use App\Models\bookDetail;

class recommend extends Controller
{
    //
    public function recommend(){
        
        $info = bookDetail::all();
        $detail = User::all();
        $value='1';
        $email = 'n/a';
        $email2 = 'n/';
        $value = 'n';
        $value1 = '0';
        $descriptions = 'de';
        $string = 'Get all your make up need with best price and get both home as well as studio service';
           
            $email='mandipgurung233@gmail.com';
        
          
                    $vendorEmail = array();
                    foreach ($info as $infos){      
                        $recodescri = $infos->email;
                        if ($email == $recodescri){
                            $value1 = $infos->venEmail;
                            array_push($vendorEmail, $value1);
                        }
                    }
                    $total = count($vendorEmail);
                    
                    
                    $i = 0;
                    $finalRecommend = array();
                    while ($i < $total){
                        $descriptions = $vendorEmail[$i];
                        $description1 = Approved::where(['email'=>$descriptions])->first();
                        $string = $description1->description;
                        $result = shell_exec('cd / && cd xampp/htdocs/WedMadeSimple/public/recommendation && c:/xampp/htdocs/WedMadeSimple/public/recommendation/venv/Scripts/Activate.ps1 && c:/xampp/htdocs/WedMadeSimple/public/recommendation/venv/Scripts/python.exe c:/xampp/htdocs/WedMadeSimple/public/recommendation/recommend.py 2>&1 "'.$string.'"');
                        $result1 = substr("$result",0,-2);
                        $value = explode(",",$result1);
                        $obtainedRecomm = count($value);
                        $j = 0;
                        while ($j < $obtainedRecomm){
                            $recommend = $value[$j];
                            array_push($finalRecommend, $recommend);
                            $j = $j + 1;
                        }
                        $i = $i + 1;
                        /*
                        $description1 = Approved::where(['email'=>$descriptions])->first();
                        $string = $description1->description;
                        $result = shell_exec('cd / && cd xampp/htdocs/WedMadeSimple/public/recommendation && c:/xampp/htdocs/WedMadeSimple/public/recommendation/venv/Scripts/Activate.ps1 && c:/xampp/htdocs/WedMadeSimple/public/recommendation/venv/Scripts/python.exe c:/xampp/htdocs/WedMadeSimple/public/recommendation/recommend.py 2>&1 "'.$string.'"');
                        $result1 = substr("$result",0,-2);
                        $value = explode(",",$result1);
                        $obtainedRecomm = count($value);
                        $j = 0;
                        while ($j < $obtainedRecomm){
                            $recommend = $value[$j];
                            array_push($finalRecommend, $recommend);
                            $j = $j + 1;
                        }*/
                     
                        
                    }
              
                    $finalRecommends = array_unique($finalRecommend);
                    return $finalRecommends;
                    foreach ($finalRecommends as $key => $value){
                        echo $value;
                    }
                  
                       
           
                  
        
    
        /*
        $string = 'Reid & Taylor Men Check Purple Shirts';
        $result = shell_exec('cd / && cd xampp/htdocs/WedMadeSimple/public/recommendation && c:/xampp/htdocs/WedMadeSimple/public/recommendation/venv/Scripts/Activate.ps1 && c:/xampp/htdocs/WedMadeSimple/public/recommendation/venv/Scripts/python.exe c:/xampp/htdocs/WedMadeSimple/public/recommendation/recommend.py 2>&1 "'.$string.'"');
        $result1 = substr("$result",0,-2);
        $value = explode(",",$result1);
        return $value;*/
    }
}
