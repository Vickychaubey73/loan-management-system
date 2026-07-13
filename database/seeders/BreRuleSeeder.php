<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BreRule;

class BreRuleSeeder extends Seeder
{
    public function run(): void
    {
        BreRule::create([
            'field' => 'age',
            'operator' => '>=',
            'value' => '21',
            'message' => 'Age must be at least 21'
        ]);

        BreRule::create([
            'field' => 'age',
            'operator' => '<=',
            'value' => '60',
            'message' => 'Age must not exceed 60'
        ]);

        BreRule::create([
            'field' => 'monthly_income',
            'operator' => '>=',
            'value' => '30000',
            'message' => 'Monthly income should be at least ₹30000'
        ]);

        BreRule::create([
            'field' => 'credit_score',
            'operator' => '>=',
            'value' => '700',
            'message' => 'Credit score should be at least 700'
        ]);

        BreRule::create([
            'field' => 'loan_percentage',
            'operator' => '<=',
            'value' => '80',
            'message' => 'Loan amount cannot exceed 80% of property value'
        ]);
    }
}