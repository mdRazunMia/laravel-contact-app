<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'Contacts';
    protected $fillable = ['first_name', 'last_name', 'phone', "address", 'email', 'company_id'];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
