<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'about_store',
        'store_features',
        'store_address',
        'phone',
        'email',
        'facebook_link',
        'whatsapp_link',
        'instagram_link',
        'desktop_about_image', // Updated column name
        'mobile_about_image',  // Updated column name
        'exchange_number'
    ];
    
    public static function getExchangeNumber()
    {
        // Assuming there's only one row in the contents table
        return self::first()->exchange_number ?? 1;
    }
}
