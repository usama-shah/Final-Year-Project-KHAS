<?php

use Carbon\Carbon;
function dateDiff($date)
{
    // Get the current date and time
    $now = Carbon::now();

    // Get the date and time of the provided $date value
    $created_at = Carbon::parse($date);

    // Calculate the time difference between now and the provided $date value
    $time_diff_in_minutes = $now->diffInMinutes($created_at);
    $time_diff_in_hours = $now->diffInHours($created_at);
    $time_diff_in_days = $now->diffInDays($created_at);

    // Format the time difference as a human-readable "ago" time
    if ($time_diff_in_minutes < 60) {
        $time_ago = $time_diff_in_minutes . " minutes ago";
    } elseif ($time_diff_in_hours < 24) {
        $time_ago = $time_diff_in_hours . " hours ago";
    } else {
        if ($time_diff_in_days == 1) {

            $time_ago = $time_diff_in_days . " day ago";
        } else {
            $time_ago = $time_diff_in_days . " days ago";

        }
    }

    // Return the human-readable time
    return $time_ago;
}
