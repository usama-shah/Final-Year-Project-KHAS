<?php

namespace App\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    /**
     * Bind the authenticated user data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $authUser = Auth::check() ? Auth::user() : false;
        $view->with('authUser', $authUser);
    }
}
