<?php

/*
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */

/**
 * Description of MY_string_helper
 *
 * @author luoam
 */
function strip_cslashes($str)
{
        if ( ! is_array($str))
        {
                return stripcslashes($str);
        }

        foreach ($str as $key => $val)
        {
                $str[$key] = strip_cslashes($val);
        }

        return $str;
}