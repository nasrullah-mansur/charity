<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CharityFeatureRequest;
use App\Models\Charity;
use Illuminate\Http\Request;

class CharityController extends Controller
{
    public function index (Request $request)
    {
        if($request->isMethod('POST'))
        {
            app(CharityFeatureRequest::class);
            
            $charity = Charity::first();

            $charityData['pl_title_01'] = $request->pl_title_01;
            $charityData['pl_title_02'] = $request->pl_title_02;
            $charityData['pl_title_03'] = $request->pl_title_03;
            $charityData['pl_title_04'] = $request->pl_title_04;

            $charityData['pl_subtitle_01'] = $request->pl_subtitle_01;
            $charityData['pl_subtitle_02'] = $request->pl_subtitle_02;
            $charityData['pl_subtitle_03'] = $request->pl_subtitle_03;
            $charityData['pl_subtitle_04'] = $request->pl_subtitle_04;

            $charityData['sl_title_01'] = $request->sl_title_01 ? $request->sl_title_01 : $request->pl_title_01;
            $charityData['sl_title_02'] = $request->sl_title_02 ? $request->sl_title_02 : $request->pl_title_02;
            $charityData['sl_title_03'] = $request->sl_title_03 ? $request->sl_title_03 : $request->pl_title_03;
            $charityData['sl_title_04'] = $request->sl_title_04 ? $request->sl_title_04 : $request->pl_title_04;

            $charityData['sl_subtitle_01'] = $request->sl_subtitle_01 ? $request->sl_subtitle_01 : $request->pl_subtitle_01;
            $charityData['sl_subtitle_02'] = $request->sl_subtitle_02 ? $request->sl_subtitle_02 : $request->pl_subtitle_02;
            $charityData['sl_subtitle_03'] = $request->sl_subtitle_03 ? $request->sl_subtitle_03 : $request->pl_subtitle_03;
            $charityData['sl_subtitle_04'] = $request->sl_subtitle_04 ? $request->sl_subtitle_04 : $request->pl_subtitle_04;

            $charityData['active_status'] = $request->active_status;

            if(!empty($request->image)){
                $old_image = $charity  ? $charity->image : '';
                $new_image = $request->image;

                $charityData['image'] = fileUpload($new_image, path_image(), $old_image);
            }

            if($charity)
            {
                $charity->update($charityData);
                toast('Charity Features successfully updated', 'success');

                return redirect()->back();
            } else{

                Charity::create($charityData);
                toast('Charity Features successfully added', 'success');

                return redirect()->back();
            }

        }

        $charity = Charity::first();
        return view('admin.charity.index', ['charity' => $charity, 'menu' => 'Home', 'page_title' => 'Charity Features']);
    }
}
