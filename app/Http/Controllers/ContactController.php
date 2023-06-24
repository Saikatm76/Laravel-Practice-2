<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ContactController extends Controller
{

    protected $company;

    // protected function getContacts()
    // {

    //     $contacts = [
    //         1 => ['name' => 'saikat', 'id' => '1423', 'phone' => 9874454124],
    //         2 => ['name' => 'argha', 'id' => '2342', 'phone' => 8874454123]
    //     ];


    //     return $contacts;
    // }


    public function __construct(CompanyRepository $com)
    {
        $this->company = new $com;
    }


    public function index()
    {
        $companies = $this->company->company();

        $contacts = Contact::paginate(10);

        // dd($contacts);

        return Blade::render('contacts.index', compact('contacts', 'companies'));
    }


    public function create()
    {
        return Blade::render('contacts.create');
    }

    public function single_contact(Request $request)
    {
        // $contacts = $this->getContacts();
        $contact = Contact::find($request->id);
        abort_if(empty($contact), 404);
        // dd($contact);
        // $contact = $contacts[$request->id];
        $contact->name = $contact->first_name . ' ' . $contact->last_name;

        return Blade::render('contacts.singlecontact', compact('contact'));
    }
}
