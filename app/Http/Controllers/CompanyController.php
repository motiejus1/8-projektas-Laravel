<?php

namespace App\Http\Controllers;

use App\Company;
use App\Type;
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
        $types = Type::all();
        return view("company.create",["types"=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //iterpimas i duomenu baze
        //man bande i duomenu baze sukelti netinkamus ar tuscius duomenis

        $company = new Company;

        // Pavadinimas yra privalomas ir turi buti unikalus, kiek simboliu leisti ivesti
        // Neturi leisti prideti iraso su tokiu pat pavadinimu, jei jis yra randamas, duomenu bazeje

        //  3. Task redagavime ir pridėjime uždėti tikrinimą,
        // kad pabaigos data(end_date) nebūtų ansktesnė nei pradžios(start_date).


        // if($end_date > $start_date ) - pabaigos data po pradzios datos(after)
        //if ($start_date < $endate) - pradzios data yra pries pabaigos data(before)

        //after:
        //before:


        //paint
        //paveiksliuko tipas

        //jpg, png, gif ...

        $validateVar = $request->validate([
            // 'title' => 'required|min:6|unique:companies',
                // 'title' => ['required', 'min:6', 'unique:companies'],
                // 'description' => 'required|min:6|max:50',
                // 'number' => 'numeric|integer' //ar tai yra skaicius, ir jis yra sveikasis
                // 'number' => 'digits:3', // 1. jinai patikrina ar tai yra skaicius 2. ar skaicius turi 3 skaitmenis
                // 'logo' => 'image|mimes:jpg,jpeg',
                //kaip leisti ikelti tik lankomumo ataskaitos formata?
                'logo' => 'file|max:2048', //kai max funkcija yra naudoja su file, skaicius reiskia dydi kilobaitais
                'number' => 'digits_between:1,3',
                'qty' => 'numeric|gte:max_qty',// gt - greater than qty > 0; gte = qty >=0
                                        // lt - less tahn qty < skaicius, lte = qty <= skaicius
                'max_qty' => 'numeric',
                'start_date' => 'required|date', //required|date|before:end_date
                'end_date' => 'required|date|after:start_date',
                //uzpildytas
            // 'type_id' => 'required'
        ]);

        // veikia ifas: validate funkcija nutraukia store funkcijos  veikima
        // jeigu ivyksta klaida: duomenys apie klaida yra patalpinami i $errors kintamaji
        //$errors kintamasis savyje turi 0 erroru

        $company->title = $request->title;
        $company->description = $request->description;
        $company->logo = "https://paveiksliukas.lt";
        $company->type_id = $request->type_id;

        $company->save();

        return redirect()->route("company.index");

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

        // SELECT * FROM COmpany WHERE 1
        //filtruojama kompaniju kolekcija

        //WHERE type_id = 151 OR type_id = 152

        // $companies = Company::query()->where("type_id", 151)->orWhere("type_id", 152)->get();

        // SELECT * FROM Company WHERE
        // type_id = 151 OR type_id = 152


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
