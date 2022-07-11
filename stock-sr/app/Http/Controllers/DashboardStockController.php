<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.stocks.index', [
            'stocks' => Stock::latest()->paginate(50)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.stocks.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|max:255',
            'category_id'       => 'required',
            'imei'              => '',
            'harga_jual'        => 'required',
            'harga_beli'        => 'required',
            'diskon_beli'       => 'required',
            'status'            => 'required',
            'pembeli'           => '',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Stock::create($validatedData);

        return redirect('/dashboard/stocks')->with('success', 'Stock Barang Baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('dashboard.stocks.show', [
            'stock' => $stock
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('dashboard.stocks.edit', [
            'stock'         => $stock,
            'stocks'        => Stock::all(),
            'categories'    => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $rules = [
            'name'              => 'required|max:255',
            'category_id'       => 'required',
            'imei'              => '',
            'harga_jual'        => 'required',
            'harga_beli'        => 'required',
            'diskon_beli'       => 'required',
            'status'            => 'required',
            'pembeli'           => '',
        ];

        $validatedData = $request->validate($rules);
        
        // Edit Sesuai ID
        $validatedData['user_id'] = auth()->user()->id;

        Stock::where('id', $stock->id)
                    ->update($validatedData);

        return redirect('/dashboard/stocks')->with('success', 'Stock barang telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        Stock::destroy($stock->id);
        return redirect('/dashboard/stocks')->with('success', 'Post Stock Product telah dihapus!');
    }
}
