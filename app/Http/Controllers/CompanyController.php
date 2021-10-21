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
    public function index(Request $request)
    {
        //numatytasis rikiavimas yra pagal id stulpeli nuo maziausio iki didziausio('asc')
        // id - desc/asc
        // title - desc/asc
        // description - desc/asc
        // type - desc/asc

        // $companies = Company::all();

        //isrikitiuo pagal id stulpeli desc

        //1.
        //  $companies = Company::orderBy('id', 'desc')->get();

        // SELECT * FROM companies
        // WHERE 1
        // ORDER BY companies.id desc

        //2.
        // true - mazejimo tvarka
        // false - didejimo tvarka
        // $companies = Company::all()->sortBy('id', SORT_REGULAR, true);
        // SELECT * FROM companies

        // Kompanijos yra paverciamos i kolekcija/masyva
        //IR jau masyvas yra isriuokiuojamas

        //3. sort ir sortDesc
        // sort rikiuoja pagal id didejimoTvarka
        // $companies = Company::all()->sort();
        // sortDesc rikiuoja pagal id mazejimo TVarka
        // $companies = Company::all()->sortDesc();

        //kolekcija tas pats asociatyvus objektu masyvas, kuri galima filtruoti ir rikiuoti

        // SELECT * FROM companies
        // WHERE(filtravimas)
        // ORDER BY(rikiavimas) stulpelis ASC/DESC

        //Duomenu lentele
        //Turejome rikiavimo forma, stulpelio pagal kuri rikiuosim, rikiavimo kryptis
        //GET metodu

        // SELECT * FROM companies
        // WHERE 1
        //ORDERBY $collumnName $sortby

        // tuos 2 kintamuosius is nuorodos pasiimti per GET?

        // $_GET/$_POST => $request

        $collumnName = $request->collumnname; // 'po formos patvirinimo jie yra gauti'
        $sortby = $request->sortby; // 'po formos patvirtinimo jie yra gaut'

        if(!$collumnName && !$sortby ) {
            $collumnName = 'id';
            $sortby = 'asc';
        }

        // $companies = Company::orderBy( $collumnName, $sortby)->get();

        //puslapiavimas
        $companies = Company::orderBy( $collumnName, $sortby)->paginate(15);
        return view('company.index', ['companies' => $companies, 'collumnName' => $collumnName, 'sortby' => $sortby]);
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
