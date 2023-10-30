<?php

use App\Models\User;
use App\Models\JournalistDetail;

function getCurrentUserImageName($id)
{
    return JournalistDetail::select('photo')->where('user_id', $id)->first()->photo;
}
