<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShopRequest;
use App\Manager;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.jwt')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        if ($request->search) {
            return Shop::where('name', 'like', '%' . $request->search . '%')->with('manager')->paginate(10);
        }

        return Shop::with('manager', 'articles')->paginate(10);
    }

    public function availableShops()
    {
        return Shop::where('manager_id', NULL)->get();
    }

    public function shopsForArticles()
    {
        return Shop::get();
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
    public function store(NewShopRequest $request)
    {
        $data = $request->all();
        if ($data['manager_id'] === '') {
            $data['manager_id'] = 'NULL';
        }

        $shop = Shop::create($data);
        if ($data['manager_id']) {
            $manager = Manager::find($data['manager_id']);
            $manager->shop_id = $shop->id;
            $manager->save();
        }

        return response()->json(['message' => 'Successfully created new shop.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shop::with('manager', 'articles', 'comments')->find($id);
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
    public function update(NewShopRequest $request, $id)
    {
        $shop = Shop::find($id);
        $shop->update($request->all());

        return $shop;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Manager::where('shop_id', $id)->update(['shop_id' => NULL]);
        Shop::destroy($id);

        return response()->json(['message' => 'Shop deleted.'], 200);
    }
}
