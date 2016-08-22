<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 8/20/16
 * Time: 2:09 PM
 */

namespace CodeEducation\Cart;


class Cupom
{
    private $total;
    private $code;

    /**
     * @return mixed
     */
    public function getTotal($cartTotal)
    {
        return $cartTotal - $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


}