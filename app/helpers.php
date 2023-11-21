<?php

use App\Models\User;
use App\Models\Ad;
use App\Models\JournalistDetail;

function getCurrentUserImageName($id)
{
    return JournalistDetail::select('photo')->where('user_id', $id)->first()->photo;
}

function getShortContent($content)
{
    // Use strtok() to tokenize the string into words
    $words = strtok(strip_tags($content), " ");
    // Initialize a counter for words
    $wordCount = 0;
    // Array to store the first 10 words
    $firstTenWords = [];
    // Loop through the words and store the first 10 words in an array
    while ($words !== false && $wordCount < 8) {
        $firstTenWords[] = $words;
        $words = strtok(" ");
        $wordCount++;
    }
    // Join the first 10 words back into a string
    $result = implode(' ', $firstTenWords);
    // Output the result
    return $result;
}


function getconvertedDate($date)
{
    $convertedDate = date("F j, Y", strtotime($date));
    return $convertedDate;
}

function main_header_img()
{
    
   $image= Ad::select('image')->where('position','main_header')->first();
   return $image->image;
    
}
