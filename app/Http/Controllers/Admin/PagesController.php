<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsPageRequest;
use App\Http\Requests\JourneyRequest;
use Illuminate\Http\Request;
use App\Http\Services\PagesService;
use App\Models\AboutUs;
use App\Models\HelpArea;
use App\Models\Journey;

class PagesController extends Controller
{
    private $pageService;

    public function __construct(PagesService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function aboutUs(Request $request)
    {
       if ($request->isMethod('POST')) {
           app(AboutUsPageRequest::class);
            $about_us = $this->pageService->aboutUs($request);

            if ($about_us['success'] == true) {

                toast($about_us['message'], 'success');
                return redirect()->back();

            } else {

                toast($about_us['message'], 'success');
                return redirect()->back();
            }

        }
        $about = AboutUs::first();
        return view('admin.pages.about_us', ['about' => $about, 'menu' => 'About', 'page_title' => 'About Us']);
    }

    # our journey

    public function ourJourney(Request $request)
    {
       if ($request->isMethod('POST')) {

            $journey = $this->pageService->ourJourney($request);

            if ($journey['success'] == true) {

                toast($journey['message'], 'success');
                return redirect()->back();

            } else {

                toast($journey['message'], 'success');
                return redirect()->back();
            }

        }
        $journey = Journey::first();
        return view('admin.pages.journey', ['journey' => $journey, 'menu' => 'About', 'page_title' => 'Our Journey']);
    }

    # help Area

    public function helpArea(Request $request)
    {
       if ($request->isMethod('POST')) {

            $help = $this->pageService->helpArea($request);

            if ($help['success'] == true) {

                toast($help['message'], 'success');
                return redirect()->back();

            } else {

                toast($help['message'], 'success');
                return redirect()->back();
            }

        }
        $help = HelpArea::first();
        return view('admin.pages.help_area', ['help' => $help, 'menu' => 'Home', 'page_title' => 'Help Area']);
    }


}
