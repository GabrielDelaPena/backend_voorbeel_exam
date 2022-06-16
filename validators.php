<?php

function isUnderZero($number)
{
    if ($number <= 0) {
        return true;
    } else {
        return false;
    }
}

function isMoreThan50($current, $adding)
{
    $result = $current + $adding;
    if ($result > 50) {
        return true;
    } else {
        return false;
    }
}

function isNull($current, $removing)
{
    $result = $current - $removing;
    if ($result < 0) {
        return true;
    } else {
        return false;
    }
}
