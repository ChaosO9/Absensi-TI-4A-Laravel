<?php

namespace App\Http\Controllers;

use App\Models\login_info;
use App\Http\Requests\Storelogin_infoRequest;
use App\Http\Requests\Updatelogin_infoRequest;

class LoginInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storelogin_infoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(login_info $login_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login_info $login_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatelogin_infoRequest $request, login_info $login_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login_info $login_info)
    {
        //
    }
}
