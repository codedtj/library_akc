<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers;


use Inertia\Inertia;
use Inertia\Response;

class StaticPageController extends Controller
{
    public function aboutUs(): Response
    {
        return Inertia::render('Static/AboutUs');
    }

    public function userAgreement(): Response
    {
        return Inertia::render('Static/UserAgreement');
    }
}
