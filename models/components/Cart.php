<?php


class Cart
{
    public static function addProduct($id)
    {
        $_SESSION['product'] = $id;
    }

}