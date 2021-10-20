<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //numatytasis rikiavimas yra pagal id stulpeli nuo maziausio iki didziausio('asc')
        // id - desc/asc
        // title - desc/asc
        // description - desc/asc
        // type - desc/asc

        // $companies = Company::all();

        //isrikitiuo pagal id stulpeli desc
        //1.
        //  $companies = Company::orderBy('title', 'desc')->get();

        // SELECT * FROM companies
        //WHERE 1
        //ORDER BY companies.id desc

        //2.
        // true - mazejimo tvarka
        // false - didejimo tvarka
        $companies = Company::all()->sortBy('title', SORT_REGULAR, true);
        // SELECT * FROM companies
        // Kompanijos yra paverciamos i kolekcija/masyva
        //IR jau masyvas yra isriuokiuojamas



        //kolekcija tas pats asociatyvus objektu masyvas, kuri galima filtruoti ir rikiuoti

        // SELECT * FROM companies
        // WHERE(filtravimas)
        // ORDER BY(rikiavimas) stulpelis ASC/DESC

        return view('company.index', ['companies' => $companies]);
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
