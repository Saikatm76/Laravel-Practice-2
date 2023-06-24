<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $contact = [
            1 => ['name' => 'saikat', 'id' => '1'],
            2 => ['name' => 'argha', 'id' => '2']
        ];

        abort_unless(isset($contact), 404);

        return view('template')->with('contact', $contact);
    }
}
