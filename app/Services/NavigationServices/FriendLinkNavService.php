<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/5
 * Time: 18:37
 */

namespace App\Services\NavigationServices;


use App\Models\Link;

class FriendLinkNavService
{
    public function setNav()
    {
        return Link::all();
    }
}