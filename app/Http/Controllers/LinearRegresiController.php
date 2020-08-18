<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoriHarga;
use App\LinReg;
use App\JenisProduk;
use App\Transaksi;
use App\Produk;
use Phpml\Regression\LeastSquares;
use Carbon\Carbon;
use Auth;


class LinearRegresiController extends Controller
{
    // public function linreg1(){
    //     // $linreg = Linreg::all();
    //     // $tanggal_harga = $linreg->tanggal_harga;
    //     // dd($tanggal_harga);


    //     $data = array(
	// 		array(5, 21000), // (x,y) = (tanggal/bulan, harga)
	// 		array(6, 25000),
	// 		array(7, 30000),
	// 		array(8, 31000),
	// 		array(10, 41000),
	// 		array(12, 50000)
    //     );


	// 	// Return a line function
	// 	function hypothesis($intercept, $gradient) {
	// 		return function($x) use ($intercept, $gradient) {
	// 			return $intercept + ($x * $gradient);
	// 		};
	// 	}

	// 	// Return the sum of squared errors
	// 	function score($data, $hypothesis) {
	// 		$score = 0;
	// 		foreach($data as $row) {
	// 			$score += pow($hypothesis($row[0]) - $row[1], 2);
	// 		}
	// 		return $score;
	// 	}

	// 	function step($data, $parameters, $min) {
	// 		$minParams = null;
			
	// 		// Lets calculate our possibilities
	// 		$matrix = array(
	// 			array(0.25, 0),
	// 			array(-0.25, 0),
	// 			array(0, 0.25),
	// 			array(0, -0.25),
	// 		);
			
	// 		foreach($matrix as $row) {
	// 			$hypothesis = hypothesis($parameters[0] + $row[0], $parameters[1] + $row[1]);
	// 			$score = score($data, $hypothesis);
	// 			if( $min === null || $score <= $min) {
	// 				$minParams = array($parameters[0] + $row[0], $parameters[1] + $row[1]);
	// 				$min = $score;
	// 				//echo "New Min: ", $min, "\n";
	// 			}	
	// 		}
			
	// 		return array($minParams, $min);
	// 	}

	// 	function deriv($data, $hypothesis) {
	// 		$i_res = 0;
	// 		$g_res = 0;
	// 		foreach($data as $row) {
	// 			$i_res += $hypothesis($row[0]) - $row[1];
	// 			$g_res += ($hypothesis($row[0]) - $row[1]) * $row[0];
	// 		}
			
	// 		$out_i = 1/count($data) * $i_res;
	// 		$out_g = 1/count($data) * $g_res;
			
	// 		return array($out_i, $out_g);
	// 	}

	// 	function gradient($data, $parameters) {
	// 		$learn_rate = 0.01;
	// 		$hypothesis = hypothesis($parameters[0], $parameters[1]);
	// 		$deriv = deriv($data, $hypothesis);
	// 		$score = score($data, $hypothesis);

	// 		$parameters[0] = $parameters[0] - ($learn_rate * $deriv[0]);
	// 		$parameters[1] = $parameters[1] - ($learn_rate * $deriv[1]);
			
	// 		// Create a new hypothesis to test our score
	// 		$hypothesis = hypothesis($parameters[0], $parameters[1]);
	// 		if($score < score($data, $hypothesis)) {
	// 			return false;
	// 		}
			
	// 		return $parameters;
	// 	}


	// 	$parameters = array(0, 0);
	// 	$min = null;
	// 	do{
	// 		list($minParams, $min) = step($data, $parameters, $min);
	// 	} while( $minParams != null && $parameters = $minParams);
	// 	var_dump($parameters);

	// 	echo "====================\n";

	// 	$parameters = array(1, 3);
	// 	$last_parameters = false;
	// 	do {
	// 		$last_parameters = $parameters;
	// 		$parameters = gradient($data, $parameters);
	// 	} while($parameters != false);
	// 	var_dump($last_parameters);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$linregs = Linreg::with(['jenisproduk'])->get();
		$jenisProduk = JenisProduk::all();
		$historiHargas = HistoriHarga::with(['jenisproduk'])->get();
		$notif = $this->getStatusPenjual();
		//tadi yg diubah paginate(10) bel, awalnya get(). iya sama kek yang dibawah. oke, udahan ya. sipp makasi malaaakk

		// dd($historiHargas);
		// return view('prediksi.index', compact('linregs', 'jenisProduk', 'historiHargas'));
		// return view('admin.prediksi', compact('linregs', 'jenisProduk', 'historiHargas'));

		//Get linreg berdasarkan id produk yang di get
		$user = Auth::user()->id;
		$produks = Produk::where('id_user', $user)->with(['jenis', 'toko'])->orderBy('id')->get();		

		// dd($produks);

		$id_produk=[];
		foreach ($produks as $p){
			array_push($id_produk, $p->id_jenis);
		}
		// dd($id_produk);

		$linregPenjual = Linreg::whereIn('id_produk',$id_produk)->with(['jenisproduk'])->get();
		// dd($linregPenjual);
		//Menghitung prediksi berdasarkan id produknya
		$hasilPredPenjual = [];

		//Looping linreg yang sudah didapat
		foreach($linregPenjual as $lrp){
			$tglNow = Carbon::now();
			$tglPerBulan = Carbon::now()->addMonth();
			
			$tanggalAwal = $lrp->tanggal_awal;
			$sukuAwal = $lrp->suku_awal;
			$beda = $lrp->beda;

			//Looping tanggal dari saat ini hingga bulan depan
			while($tglNow->lessThan($tglPerBulan)){
				$tanggalPrediksi= $tglNow->toDateString();

				$nilai_x = $this->aritmatika($sukuAwal,$tanggalAwal,$beda,$tanggalPrediksi);
				$nilai_y = ($lrp->a*$nilai_x) + $lrp->b;

				array_push($hasilPredPenjual,[
					'id_produk' => $lrp->id_produk,
					'harga_prediksi' => $nilai_y,
					'tanggal_prediksi' => $tanggalPrediksi,
					'nilai_x' => $nilai_x,
					'suku_awal' => $sukuAwal,
					'beda' => $beda,
					'tanggal_awal' => $tanggalAwal,
					'jenis_produk' =>$lrp->jenisproduk->jenis
				]);

				$tglNow->addDay();
			}
		}
		// dd($hasilPredPenjual);
		return view('toko.penjualan.prediksi-harga',compact('linregs','jenisProduk','historiHargas','notif','hasilPredPenjual'));

	}
	
	public function indexnew()
    {
		$linregs = LinReg::with(['jenisproduk'])->OrderBy('id')->get();
		$jenisProduk = JenisProduk::all();
		// $historiHargas = HistoriHarga::with(['jenisproduk'])->get();
		$notif = $this->getStatusPenjual();
		// $nilai_y = [];
		// $tglPrediksi = [];
		// dd($linregs);

		// $jenisProduk = JenisProduk::all();
		// $jenisProdukPrediksi = JenisProduk::where('id', $jenis)->first();
		// $linregs = Linreg::with(['jenisproduk'])->get();
		// $linreg = Linreg::where('id_produk', $id_produk)->first();
		// dd($linreg);
		// If($linreg!=null){
		// 	$nilai_x = $this->aritmatika($linreg->suku_awal, $linreg->tanggal_awal, $linreg->beda, $tglPrediksi);
		// 	$nilai_y = ($linreg->a*$nilai_x) + $linreg->b;
		// 	// $int_cast = (int)$nilai_y;

		// }
		// else{
		// 	// $nilai_y = null;
		// 	return 0;
		// }
		// dd($nilai_y);
		return view('admin.indexnew',compact('linregs','jenisProduk','notif'));
	}
	
	public function historiHarga()
    {
		
		// $linregs = LinReg::with(['jenisproduk'])->get();
		$historiHargas = HistoriHarga::with(['jenisproduk'])->get();
		$jenisProduk = JenisProduk::all();
		$notif = $this->getStatusPenjual();
		// dd($linregs);
		return view('prediksi.harga',compact('jenisProduk','historiHargas','notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	public function linreg(){
		$linreg = HistoriHarga::distinct('id_produk')->get();
		$debug = [];

		foreach($linreg as $lr){
			$id_produk = $lr->id_produk;
			$currLinreg = HistoriHarga::where('id_produk',$id_produk)->orderBy('tanggal_harga')->get();

			$tanggal_x = [];
			$harga_y = [];
			
			//Mendapatkan panjang array
			$panjangArray = sizeof($currLinreg);

			//Mencari nilai tengah
			$nTengah = 0;

			//Jika ganjil
			if($panjangArray%2 == 1){
				$nTengah = ($panjangArray+1)/2;
			}

			//Jika genap
			else if($panjangArray%2 == 0){
				$nTengah = $panjangArray/2;
			}

			$nilaiTengah = $currLinreg[$nTengah-1]->tanggal_harga;

			foreach($currLinreg as $key=>$clr){
				$valueDate = $this->tgltovalue($clr->tanggal_harga, $nilaiTengah);
				array_push($tanggal_x, [$valueDate]);
				array_push($harga_y, $clr->harga_produk);
			}
	
			$regression = new LeastSquares();
			$regression->train($tanggal_x, $harga_y);	
			
			//tanggal pertahun
			$xPertahun = [];
			$tglNow = Carbon::parse('2020-01-01');
			$tglPerTahun = Carbon::parse('2020-01-01')->addYear();

			//Looping tanggal
			$regresi=Linreg::where('id_produk',$lr->id_produk)->first();
			$sukuAwal=$regresi->suku_awal;
			$tanggalAwal=$regresi->tanggal_awal;
			$beda=$regresi->beda;

			while($tglNow->lessThan($tglPerTahun)){
				$tglNow->addDay();
				$tanggalPrediksi= $tglNow->toDateString();

				$nilai_x = $this->aritmatika($sukuAwal,$tanggalAwal,$beda,$tanggalPrediksi);

				array_push($xPertahun,[
					$nilai_x
				]);
			}

			$hasil = $regression->predict($xPertahun);
	
			$valueA = $regression->getCoefficients();
	
			$valueB = $regression->getIntercept();

			$kecil = HistoriHarga::orderBy('tanggal_harga')
			->where('id_produk',$id_produk)
			->first();
			$tanggal_kecil = $kecil->tanggal_harga;

			//beda
			$beda = 0;
			$sukuAwal = 0;

			if(sizeof($tanggal_x)>1){
				$beda = $tanggal_x[1][0] - $tanggal_x[0][0];
				$sukuAwal = $tanggal_x[0][0];
			}

			//LinregBaru
			$linregBaru = LinReg::firstOrCreate(['id_produk'=>$id_produk]);
			$linregBaru->tanggal_awal = $tanggal_kecil;
			$linregBaru->a = $valueA[0];
			$linregBaru->b = $valueB;
			$linregBaru->suku_awal = $sukuAwal;
			$linregBaru->beda = $beda;

			$linregBaru->save();

			$valueDD = [
				'valueA' => $valueA[0],
				'valueB' => $valueB,
				'hasil_prediksi' => $hasil,
			];
			array_push($debug, $valueDD);
		}
		echo json_encode($debug);
	}

	public function getStatusPenjual(){
        $notif = Transaksi::whereIn('id_status',[2,3,6])->with(['jenis'])->with(['kategori'])->with(['toko'])->with(['produk'])->get();
		return $notif;
	}

	public function tgltovalue($tanggal, $tanggal_besar){
		$tglDate = Carbon::createFromFormat("Y-m-d", $tanggal);
		$tglbsr = Carbon::createFromFormat("Y-m-d", $tanggal_besar);

		$diff = $tglbsr->diffInDays($tglDate, false);//+1;
		//var_dump($diff);
		return $diff;
	}

	public function pricePredict(Request $r){
		$notif = $this->getStatusPenjual();
		$tglPrediksi = $r->tanggal_prediksi;
		$jenis = $r->id_produk;
		$jenisProduk = JenisProduk::all();
		$jenisProdukPrediksi = JenisProduk::where('id', $jenis)->first();
		$linregs = Linreg::with(['jenisproduk'])->get();
		$id_produk = $r->id_produk;
		$linreg = Linreg::where('id_produk', $id_produk)->first();

		If($linreg!=null){
			$nilai_x = $this->aritmatika($linreg->suku_awal, $linreg->tanggal_awal, $linreg->beda, $tglPrediksi);
			$nilai_y = ($linreg->a*$nilai_x) + $linreg->b;
		}
		else{
			return 0;
		}
		return view('admin.hasil',compact('notif','nilai_y', 'jenisProduk', 'linregs', 'tglPrediksi', 'jenisProdukPrediksi'));		
	}

	public function aritmatika($sukuAwal, $tanggalAwal, $beda, $tanggalPrediksi){
		//Convert string to date
		$tanggalAwal = Carbon::parse($tanggalAwal);
		$tanggalPrediksi = Carbon::parse($tanggalPrediksi);

		//mencari nilai n
		$n = $tanggalAwal->diffInDays($tanggalPrediksi);

		//mencari Un
		$hasil = $sukuAwal + (($n-1)*$beda);
		return $hasil;
	}



}
