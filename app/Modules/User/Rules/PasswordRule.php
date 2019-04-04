<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 07.03.19
 * Time: 14:45
 */

namespace App\Modules\User\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must contain one uppercase letter, one lowercase letter, one digit and be not less then 8 characters';
    }
}
