<?php

namespace App\Services;

use App\Models\BreRule;
use Carbon\Carbon;

class BreService
{
    public function checkEligibility(array $lead)
    {
        $rules = BreRule::all();

        $eligible = true;
        $reasons = [];

        $age = Carbon::parse($lead['dob'])->age;

        foreach ($rules as $rule) {

            switch ($rule->field) {

                case 'age':
                    $actual = $age;
                    break;

                case 'monthly_income':
                    $actual = $lead['monthly_income'];
                    break;

                case 'credit_score':
                    $actual = $lead['credit_score'];
                    break;

                case 'loan_percentage':
                    $actual = ($lead['loan_amount'] / $lead['property_value']) * 100;
                    break;

                default:
                    break;
            }

            if (!$this->compare($actual, $rule->operator, $rule->value)) {
                $eligible = false;
                $reasons[] = $rule->message;
            }
        }

        return [
            'status' => $eligible ? 'Eligible' : 'Not Eligible',
            'reasons' => $reasons
        ];
    }

    private function compare($a, $operator, $b)
    {
        return match ($operator) {
            '>=' => $a >= $b,
            '<=' => $a <= $b,
            '>'  => $a > $b,
            '<'  => $a < $b,
            '==' => $a == $b,
            default => false,
        };
    }
}