<?php

namespace App\Http\Services;

use App\Models\AboutUs;
use App\Models\ContactUsSetting;
use App\Models\Error404;
use App\Models\HelpArea;
use App\Models\Journey;
use App\Models\TermsAndCondition;

class PagesService
{

    public function aboutUs($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => ''];

        $aboutUs  = AboutUs::first();

        $aboutData['pl_title'] = $request->pl_title;
        $aboutData['sl_title'] = $request->sl_title ? $request->sl_title : $request->pl_title;

        $aboutData['pl_about_us'] = $request->pl_about_us;
        $aboutData['sl_about_us'] = $request->sl_about_us ? $request->sl_about_us : $request->pl_about_us;

        if (!empty($request->image)) {

            $old_img = isset($aboutUs) ? $aboutUs->image : '';
            $aboutData['image'] = fileUpload($request['image'], path_image(), $old_img);
        }

        if ($aboutUs) {

            $aboutUs->update($aboutData);
            $message = 'About us successfully updated';

        } else {
            $aboutUs = AboutUs::create($aboutData);
            $message = 'About us successfully created';

        }

        if (isset($aboutUs)) {

            $data['success'] = true;
            $data['message'] = $message;
            $data['data'] = $aboutUs;

            return $data;
        }
        return $data;

    }

    public function ourJourney($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => ''];

        $journey  = Journey::first();

        $journeyData['pl_first_stage_title'] = $request->pl_first_stage_title;
        $journeyData['sl_first_stage_title'] = $request->sl_first_stage_title ? $request->sl_first_stage_title : $request->pl_first_stage_title;
        $journeyData['pl_first_stage_subtitle'] = $request->pl_first_stage_subtitle;
        $journeyData['sl_first_stage_subtitle'] = $request->sl_first_stage_subtitle ? $request->sl_first_stage_subtitle : $request->pl_first_stage_subtitle;

        $journeyData['pl_second_stage_title'] = $request->pl_second_stage_title;
        $journeyData['sl_second_stage_title'] = $request->sl_second_stage_title ? $request->sl_second_stage_title : $request->pl_second_stage_title;
        $journeyData['pl_second_stage_subtitle'] = $request->pl_second_stage_subtitle;
        $journeyData['sl_second_stage_subtitle'] = $request->sl_second_stage_subtitle ? $request->sl_second_stage_subtitle : $request->pl_second_stage_subtitle;

        $journeyData['pl_third_stage_title'] = $request->pl_third_stage_title;
        $journeyData['sl_third_stage_title'] = $request->sl_third_stage_title ? $request->sl_third_stage_title : $request->pl_third_stage_title;
        $journeyData['pl_third_stage_subtitle'] = $request->pl_third_stage_subtitle;
        $journeyData['sl_third_stage_subtitle'] = $request->sl_third_stage_subtitle ? $request->sl_third_stage_subtitle : $request->pl_third_stage_subtitle;

        $journeyData['pl_fourth_stage_title'] = $request->pl_fourth_stage_title;
        $journeyData['sl_fourth_stage_title'] = $request->sl_fourth_stage_title ? $request->sl_fourth_stage_title : $request->pl_fourth_stage_title;
        $journeyData['pl_fourth_stage_subtitle'] = $request->pl_fourth_stage_subtitle;
        $journeyData['sl_fourth_stage_subtitle'] = $request->sl_fourth_stage_subtitle ? $request->sl_fourth_stage_subtitle : $request->pl_fourth_stage_subtitle;

        $journeyData['pl_fifth_stage_title'] = $request->pl_fifth_stage_title;
        $journeyData['sl_fifth_stage_title'] = $request->sl_fifth_stage_title ? $request->sl_fifth_stage_title : $request->pl_fifth_stage_title;
        $journeyData['pl_fifth_stage_subtitle'] = $request->pl_fifth_stage_subtitle;
        $journeyData['sl_fifth_stage_subtitle'] = $request->sl_fifth_stage_subtitle ? $request->sl_fifth_stage_subtitle : $request->pl_fifth_stage_subtitle;



        if (!empty($request->first_stage_image)) {

            $old_img = isset($journey) ? $journey->first_stage_image : '';
            $journeyData['first_stage_image'] = fileUpload($request['first_stage_image'], path_image(), $old_img);
        }

        if (!empty($request->second_stage_image)) {

            $old_img = isset($journey) ? $journey->second_stage_image : '';
            $journeyData['second_stage_image'] = fileUpload($request['second_stage_image'], path_image(), $old_img);
        }

        if (!empty($request->third_stage_image)) {

            $old_img = isset($journey) ? $journey->third_stage_image : '';
            $journeyData['third_stage_image'] = fileUpload($request['third_stage_image'], path_image(), $old_img);
        }

        if (!empty($request->fourth_stage_image)) {

            $old_img = isset($journey) ? $journey->fourth_stage_image : '';
            $journeyData['fourth_stage_image'] = fileUpload($request['fourth_stage_image'], path_image(), $old_img);
        }

        if (!empty($request->fifth_stage_image)) {

            $old_img = isset($journey) ? $journey->fifth_stage_image : '';
            $journeyData['fifth_stage_image'] = fileUpload($request['fifth_stage_image'], path_image(), $old_img);
        }

        if ($journey) {

            $journey->update($journeyData);
            $message = 'Our Journy Section successfully updated';

        } else {

            $journey = Journey::create($journeyData);
            $message = 'Our Journy Section successfully created';

        }

        if (isset($journey)) {

            $data['success'] = true;
            $data['message'] = $message;
            $data['data'] = $journey;

            return $data;
        }
        return $data;

    }

    public function helpArea($request)
    {
        $data = ['success' => false, 'message' => 'Something went wrong', 'data' => ''];

        $help  = helpArea::first();

        $helpData['pl_title'] = $request->pl_title;
        $helpData['sl_title'] =$request->sl_title ? $request->sl_title : $request->pl_title;

        $helpData['first_section_icon'] = $request->first_section_icon;
        $helpData['second_section_icon'] = $request->second_section_icon;
        $helpData['third_section_icon'] = $request->third_section_icon;
        $helpData['fourth_section_icon'] = $request->fourth_section_icon;

        $helpData['first_section_counter'] = $request->first_section_counter;
        $helpData['second_section_counter'] = $request->second_section_counter;
        $helpData['third_section_counter'] = $request->third_section_counter;
        $helpData['fourth_section_counter'] = $request->fourth_section_counter;

        $helpData['pl_first_section_title'] = $request->pl_first_section_title;
        $helpData['pl_second_section_title'] = $request->pl_second_section_title;
        $helpData['pl_third_section_title'] = $request->pl_third_section_title;
        $helpData['pl_fourth_section_title'] = $request->pl_fourth_section_title;

        $helpData['sl_first_section_title'] = $request->sl_first_section_title ? $request->sl_first_section_title : $request->pl_first_section_title;
        $helpData['sl_second_section_title'] = $request->sl_second_section_title ? $request->sl_second_section_title : $request->pl_second_section_title;
        $helpData['sl_third_section_title'] = $request->sl_third_section_title ? $request->sl_third_section_title : $request->pl_third_section_title;
        $helpData['sl_fourth_section_title'] = $request->sl_fourth_section_title ? $request->sl_fourth_section_title : $request->pl_fourth_section_title;
        $helpData['active_status'] = $request->active_status;

        if (!empty($request->background_image)) {

            $old_img = isset($help) ? $help->background_image : '';
            $helpData['background_image'] = fileUpload($request['background_image'], path_image(), $old_img);
        }
        if ($help) {

            $help->update($helpData);
            $message = 'Help Area section successfully updated';

        } else {

            $help = HelpArea::create($helpData);
            $message = 'Help Area section successfully created';

        }

        if (isset($help)) {

            $data['success'] = true;
            $data['message'] = $message;
            $data['data'] = $help;

            return $data;
        }
        return $data;

    }

}
