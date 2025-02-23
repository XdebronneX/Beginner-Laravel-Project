<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\GroomingService;
use App\Models\Pet;
use Illuminate\Http\Request;

use View;
use Auth;
use DB;
use Session;
use App\Cart;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transacts = GroomingService::whereNull('deleted_at')->get();
        return view('home', compact('transacts'));
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function getAddToCart(Request $request , $id)
    {
        $service = GroomingService::find($id);
        // $oldCart = Session::has('cart') ? $request->session()->get('cart'): null;
        $oldCart = Session::has('cart') ? Session::get('cart'): null;

        $cart = new Cart($oldCart);
        $cart->add($service, $service->service_id);
        //$request->session()->put('cart', $cart);
        Session::put('cart', $cart);
        //$request->session()->save();
        Session::save();
        //dd(Session::all());
        return redirect()->route('transact.index');
    }

    public function getCart() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $pets = Pet::pluck('pname','pet_id');
        //dd($oldCart);
        return view('shop.shopping-cart', ['services' => $cart->services, 'totalPrice' => $cart->totalPrice],compact('pets'));
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->services) > 0) {
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
         return redirect()->route('service.shoppingCart');
    }

    // public function storeCheckout(Request $request)
    // {
    //     if (!Session::has('cart')) {
    //         return redirect()->route('transact.index');
    //     }
    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);
    //      //dd($cart);
    //     try {
    //          DB::beginTransaction();
    //         $order = new Transaction();
    //         //dd($order);
    //         $order->pet_id = $request->pet_id;
    //         // $order->status = 'Processing';
    //         dd($order);
    //         $order->save();
    //         // dd($order);
    //     foreach($cart->services as $services){
    //             $id = $services['service']['service_id'];
    //              //dd($id);
    //             DB::table('groomingline')->insert(
    //                 ['service_id' => $id, 
    //                  'groominginfo_id' => $order->groominginfo_id
    //                 ]
    //                 );
    //         }
    //         // dd($order);
    //     }
    //     catch (\Exception $e) {
    //          //dd($e);
    //         DB::rollback();
    //          //dd($order);
    //         return redirect()->route('service.shoppingCart')->with('error', $e->getMessage());
    //     }
    //         DB::commit();
    //         Session::forget('cart');
    //         return redirect()->route('transact.index')->with('success','Successfully Purchased Your Products!!!');
    // }

   public function storeCheckout(Request $request)
{
    if (!Session::has('cart')) {
        return redirect()->route('transact.index');
    }

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);

    try {
        DB::beginTransaction();

        // Create a new Transaction (grooming_info entry)
        $order = new Transaction();
        $order->pet_id = $request->pet_id;
        $order->status = 'Processing';
        $order->save(); // Save first before accessing groominginfo_id

        // Debugging: Check if order saved correctly
        // dd($order->toArray()); // Check what was saved in the database

        // Retrieve generated ID
        $orderId = $order->groominginfo_id;

        if (!$orderId) {
            throw new \Exception('Order ID not generated.');
        }

    foreach ($cart->services as $service) {
    $id = $service['service']['service_id'];
    $groominginfo_id = $order->groominginfo_id;

    // Debug: Print values before insert
    // dd([
    //     'service_id' => $id,
    //     'groominginfo_id' => $groominginfo_id
    // ]);

    // Perform insert
    $inserted = DB::table('groomingline')->insert([
        'service_id' => $id,
        'groominginfo_id' => $groominginfo_id
    ]);

    // Check if insertion was successful
    if (!$inserted) {
        dd("Insertion Failed!");
    }
}

        DB::commit();
        Session::forget('cart');

        return redirect()->route('transact.index')->with('success', 'Successfully Purchased Your Products!');
    } catch (\Exception $e) {
        DB::rollback();
        \Log::error('Checkout Error: ' . $e->getMessage());
        return redirect()->route('service.shoppingCart')->with('error', $e->getMessage());
    }
}



    public function search(Request $request){
        $search= $request->get('search');
        //Select pets table
         $transacts = DB::table('grooming_info')
            ->leftJoin('pets','pets.pet_id','=','grooming_info.pet_id')
            ->leftJoin('groomingline','groomingline.groominginfo_id','=','grooming_info.groominginfo_id')
            ->leftJoin('customers','customers.customer_id','=','pets.customer_id')
            ->leftJoin('grooming_service','grooming_service.service_id','=','groomingline.service_id')
            ->select('grooming_info.groominginfo_id','customers.lname','customers.fname','pets.pname','grooming_service.service_name','grooming_info.status','grooming_info.created_at')
            ->where('service_name','LIKE', '%' .$search. '%')
            ->paginate(10);
           
        // return View::make('history.index',compact('transacts'));
        return view('history.index', ['transacts' => $transacts]);

    }

    public function indexSearch(){
         $transacts = DB::table('grooming_info')
            ->leftJoin('pets','pets.pet_id','=','grooming_info.pet_id')
            ->leftJoin('groomingline','groomingline.groominginfo_id','=','grooming_info.groominginfo_id')
            ->leftJoin('customers','customers.customer_id','=','pets.customer_id')
            ->leftJoin('grooming_service','grooming_service.service_id','=','groomingline.service_id')
            ->select('grooming_info.groominginfo_id','customers.lname','customers.fname','pets.pname','grooming_service.service_name','grooming_info.status','grooming_info.created_at')
            ->get();

         return View::make('history.index',compact('transacts'));

    }
}
     

