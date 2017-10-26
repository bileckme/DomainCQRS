<?php namespace Domain\CQRS\Queries\Validators;

use Illuminate\Support\Facades\Validator;

/**
 * Class QueryValidator
 * @package Domain\CQRS\Queries\Validators
 */
abstract class QueryValidator
{

    /**
     * @param array $data
     * @return mixed
     */
    public function validate(array $data)
    {
        return Validator::make($data, $this->rules, $this->message);
    }
}
