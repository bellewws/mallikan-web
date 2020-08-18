<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Produk;
use DB;
use Auth;


class RekomendasiController extends Controller
{
    public function similarityDistance($preferences, $person1, $person2)
    {
        $similar = array();
        $sum = 0;
    
        foreach($preferences[$person1] as $key=>$value)
        {
            if(array_key_exists($key, $preferences[$person2]))
                $similar[$key] = 1;
        }
        
        if(count($similar) == 0)
            return 0;
        
        foreach($preferences[$person1] as $key=>$value)
        {
            if(array_key_exists($key, $preferences[$person2]))
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
        }
        
        return  1/(1 + sqrt($sum));     
    }

    // public function matchItems($preferences, $person)
    // {
    //     $score = array();
        
    //         foreach($preferences as $otherPerson=>$values)
    //         {
    //             if($otherPerson !== $person)
    //             {
    //                 $sim = $this->similarityDistance($preferences, $person, $otherPerson);
                    
    //                 if($sim > 0)
    //                     $score[$otherPerson] = $sim;
    //             }
    //         }
        
    //     array_multisort($score, SORT_DESC);
    //     return $score;
    
    // }
    
    
    // public function transformPreferences($preferences)
    // {
    //     $result = array();
        
    //     foreach($preferences as $otherPerson => $values)
    //     {
    //         foreach($values as $key => $value)
    //         {
    //             $result[$key][$otherPerson] = $value;
    //         }
    //     }
        
    //     return $result;
    // }
    
    
    public function getRecommendations($preferences, $person)
    {
        $total = array();
        $simSums = array();
        $ranks = array();
        $sim = 0;
        
        foreach($preferences as $otherPerson=>$values)
        {
            if($otherPerson != $person)
            {
                $sim = $this->similarityDistance($preferences, $person, $otherPerson);
            }
            
            if($sim > 0)
            {
                foreach($preferences[$otherPerson] as $key=>$value)
                {
                    if(!array_key_exists($key, $preferences[$person]))
                    {
                        if(!array_key_exists($key, $total)) {
                            $total[$key] = 0;
                        }
                        $total[$key] += $preferences[$otherPerson][$key] * $sim;
                        
                        if(!array_key_exists($key, $simSums)) {
                            $simSums[$key] = 0;
                        }
                        $simSums[$key] += $sim;
                    }
                }
                
            }
        }

        foreach($total as $key=>$value)
        {
            $ranks[$key] = $value / $simSums[$key];
            // echo $key[$value];
            // echo $key."\n";
            // echo "Value : ".$value."\n";
            // echo "simSums : ".$simSums[$key]."\n";
        }
        
        array_multisort($ranks, SORT_DESC);    
        return $ranks;
        // dd ($ranks);
        // return key($ranks);
        
    }

    public function index()
    {
        $transaksiUser = Transaksi::distinct('id_user')->get();
        $user = Auth::user();
        // dd($user->id);

        $arraySample = [];

        //Dimensi pertama
        foreach ($transaksiUser as $tu) {
            $id_user = $tu->id_user;

            $transaksiProdukUser = Transaksi::select(DB::raw('jenis_produks.jenis as jenis, transaksis.id_user, avg(transaksis.rating) as rata_rating'))
            ->join('produks', 'produks.id', '=', 'transaksis.id_produk')
            ->join('jenis_produks', 'jenis_produks.id', '=', 'produks.id_jenis')
            ->where('transaksis.id_user', $id_user)
            ->groupby('jenis_produks.jenis','transaksis.id_user')
            ->get();
            // return $transaksiProdukUser;
            // dd($transaksiProdukUser);
            $produkArray = []; //dimensi kedua

            //Dimensi kedua
            foreach ($transaksiProdukUser as $tpu) {
                if ($tpu->rata_rating != null) {
                    $produkArray[$tpu->jenis] = $tpu->rata_rating;
                }
            }
            if (sizeof ($produkArray) > 0) {
                $arraySample[$id_user] = $produkArray;
            }

        }   
        // print_r($arraySample);
        // dd($arraySample);

        // $products =  array(
                
        //     "member1" => array("2" => 5, "3" => 4,
        //                     "4" => 3),
            
        //     "member2" => array("3" => 3, "4" => 2,
        //                     "5" => 4, "6" => 1),
            
        //     "member3" => array("2" => 3, "6" => 3),
            
        //     "member4" => array("1" => 4, "4" => 1),
            
        //     "member5" => array("2" => 2, "3" => 2,
        //                     "4" => 4, "6" => 5),
            
        //     "member6" => array("2" => 3, "4" => 4)
            
        // );

        // return $products;

        // $hasil = $this->getRecommendations($products, 3);
        $hasil = $this->getRecommendations($arraySample, 4);
        return PembeliDashboardController::make('pembeli.home')->with(compact('hasil'));
        // return view('pembeli.home', $hasil);        
        // print_r($this->getRecommendations($arraySample, 4));
        print_r($hasil);
          
    }
    

}
