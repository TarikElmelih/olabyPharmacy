<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    protected $fillable = [
        'drug_name',
        'drug_image',
        'drug_description',
        'customer_name',
        'customer_phone',
        'customer_email',
    ];
}
