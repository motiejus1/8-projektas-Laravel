<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

use PDF;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $clients = Client::all();
        return view('client.index', ['clients' => $clients]);
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
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view("client.show", ["client"=> $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function generateClientPDF(Client $client) {
        //jis mums duoda specifinio kliento informacija pagal id
          //1. Pasiimti  duomenis apie klienta
        // 2. panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda


        view()->share('client', $client);

        //sukurti kita pdf template
        $pdf = PDF::loadView("pdf_client_template", $client);

        return $pdf->download("client".$client->id.".pdf");

        //return $client->id;
    }

    public function generatePDF() {

        //1. Pasiimti visus duomenis x
        // 2. kazkokiu panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda

        $clients = Client::all();

        view()->share('clients', $clients);

        $pdf = PDF::loadView("pdf_template", $clients);

        return $pdf->download("clients.pdf");


        // return 0;
    }
}
