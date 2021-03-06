<?php

namespace App\Http\Controllers;

use App\DataTables\PromotionsDataTable;
use App\DataTables\PromotionsDataTableEditor;
use App\Models\Promotion;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    //     $data=['promos'=>Promotion::all(),'active'=> 4];
    //     // dd($data);
    //     return view('pages.promo',$data);
    // }
    public function index(PromotionsDataTable $dataTable)
    {
        // $promo = Promotion::all();
        $data =[
            'title' => 'Quản lý voucher',
            // 'type' => $type,
            'active' => [1,3],
        ];
        return $dataTable->render('admin.pages.voucher',$data);
    }

    public function store(PromotionsDataTableEditor $editor)
    {
        return $editor->process(request());
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

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StorePromotionRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StorePromotionRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromotionRequest  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
