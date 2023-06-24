<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function company()
    {
        // return [
        //     1 => ['name' => 'elphill', 'contacts' => '98455545'],
        //     2 => ['name' => 'tcs', 'contacts' => '45787554'],
        //     3 => ['name' => 'cts', 'contacts' => '87854599']
        // ];

        // return Company::orderBy('name')->pluck('name','id');

        $data = [];

        $companies = Company::orderBy('name')->get();

        foreach ($companies as $company) {
            $data[$company->id] = $company->name . " (" . $company->contacts()->count() . ")";
        }
        return $data;
    }
}
