<?php
/**
 * Created by PhpStorm.
 * User: biyi
 * Date: 2017/10/27
 * Time: 8:06 AM
 */

namespace Domain\CQRS\Domains\Model\Identity;


/**
 * Class Email
 * @package Domain\CQRS\Domains\Model\Identity
 */
class Email
{
    /**
     * Email constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $emailValidator = new EmailValidator();
        $validator = $emailValidator->validate(['email' => $value]);

        if ($validator->fails())
        {
            throw new UnexpectedValueException();
        }
        $this->setValue($value);
    }

    /**
     * Return the object as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}