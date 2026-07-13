<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'full_name',
        'mobile',
        'email',
        'dob',
        'city',
        'pincode',
        'loan_type',
        'employment_type',
        'monthly_income',
        'loan_amount',
        'property_value',
        'consent',
        'credit_score',
        'bre_status',
        'rejection_reason'
    ];
}