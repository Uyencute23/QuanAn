<?php

namespace App\Http\Controllers;

use App\DataTables\CustumerOrderDataTable;
use App\Models\Customer;
use App\Models\Promotion;
use Illuminate\Http\Request;

class CustomerOrder extends Controller
{
    public function index(CustumerOrderDataTable $dataTable)
    {
        // $type = ProductType::all();
        $data = [
            'title' => 'Quản lý hoá đơn',
            'active' => [1, 2],
            'customers' => Customer::all(),
            'promotions' => Promotion::all(),
            // 'type' => $type,
        ];
        return $dataTable->render('pages.order', $data);
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
}
