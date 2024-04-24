<?php


function isBackend()
{
    return request()->is('user') || request()->is('user/*') || request()->is('/user/*');
}
