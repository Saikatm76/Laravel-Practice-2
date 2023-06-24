<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'id';

    // protected $guarded = [];  //(1)if it is empty then we can insert any data
    //                           //(2)if any column name that does not exist in database,want to insert show an error
    protected $fillable = ['name', 'email', 'address', 'website'];

    public function contacts()
    {
        return $this->hasMany(Contact::class, "company_id");
    }
}
