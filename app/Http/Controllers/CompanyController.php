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

    //susikurti paieska
    //controlleryje galime kurti savo funkcijas

    public function search(Request $request) {

        // $companies = Company::paginate(15);
        //Company::all()

        //SELECT * FROM companies
        //WHERE 1 //filtravimas

        //Company::orderBy('id', 'desc')->get();
        //SELECT * FROM companies
        //WHERE type_id = 5 //filtravimas
        //ORDER BY companies.id DESC


        // atfiltruoti kompanijas pagal type_id 6

        //1. tiek is DB puses dirbt
        // $companies = Company::where("type_id", 6)->get();

        //SELECT * FROM companies
        //WHERE type_id = 6

        //2. Pacios kolekcijos puse
        //  $companies = Company::all()->where("type_id",">", 6);

         //where("type_id",6) -> WHERE type_id = 6
        // where("type_id",">", 6) -> WHERE type_id > 6
        // where("type_id","<", 6) -> WHERE type_id < 6
        // where("type_id",">=", 6) -> WHERE type_id >= 6
        //where("type_id","<=", 6) -> WHERE type_id <= 6
        // where("type_id","!=", 6) -> WHERE type_id != 6

        // WHERE type_id > 16 AND type_id < 150
        // $companies = Company::all()->where("type_id",">=", 16)->where("type_id","<=", 150);

        //WHERE type_id = 151 OR type_id = 152

        // $companies = Company::query()->where("type_id", 151)->orWhere("type_id", 152)->get();


        //SELECT * FROM companies
        //WHERE title LIKE %tekstas%

        $search = $request->search;


        //WHERE title LIKE $search OR description LIKE $search
        $companies = Company::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        // SELECT * FROM companies WHERE 1
        //isideda kolekcija
        //kolekcija yra filtruojama




        return view("company.search",['companies'=> $companies]);
    }

}
