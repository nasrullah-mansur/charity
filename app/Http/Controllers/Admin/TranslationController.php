<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    # Home page
    public function home(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = Translation::get();

            foreach ($data as $item) {

                if ($item->slug == 'pl_home' && $item->value != $request->pl_home) {
                    Translation::where('slug', '=', 'pl_home')->update(['value' => $request->pl_home]);

                }elseif ($item->slug == 'sl_home' && $item->value != $request->sl_home) {
                    Translation::where('slug', '=', 'sl_home')->update(['value' => $request->sl_home ? $request->sl_home : $request->pl_home]);

                }elseif ($item->slug == 'pl_about' && $item->value != $request->pl_about) {
                    Translation::where('slug', '=', 'pl_about')->update(['value' => $request->pl_about]);

                }elseif ($item->slug == 'sl_about' && $item->value != $request->sl_about) {
                    Translation::where('slug', '=', 'sl_about')->update(['value' => $request->sl_about ? $request->sl_about : $request->pl_about]);

                }elseif ($item->slug == 'pl_pages' && $item->value != $request->pl_pages) {
                    Translation::where('slug', '=', 'pl_pages')->update(['value' => $request->pl_pages]);

                }elseif ($item->slug == 'sl_pages' && $item->value != $request->sl_pages) {
                    Translation::where('slug', '=', 'sl_pages')->update(['value' => $request->sl_pages ? $request->sl_pages : $request->pl_pages]);

                }elseif ($item->slug == 'pl_team' && $item->value != $request->pl_team) {
                    Translation::where('slug', '=', 'pl_team')->update(['value' => $request->pl_team]);

                }elseif ($item->slug == 'sl_team' && $item->value != $request->sl_team) {
                    Translation::where('slug', '=', 'sl_team')->update(['value' => $request->sl_team ? $request->sl_team : $request->pl_team]);

                }elseif ($item->slug == 'pl_blog' && $item->value != $request->pl_blog) {
                    Translation::where('slug', '=', 'pl_blog')->update(['value' => $request->pl_blog]);

                }elseif ($item->slug == 'sl_blog' && $item->value != $request->sl_blog) {
                    Translation::where('slug', '=', 'sl_blog')->update(['value' => $request->sl_blog ? $request->sl_blog : $request->pl_blog]);

                }elseif ($item->slug == 'pl_contact' && $item->value != $request->pl_contact) {
                    Translation::where('slug', '=', 'pl_contact')->update(['value' => $request->pl_contact]);

                }elseif ($item->slug == 'sl_contact' && $item->value != $request->sl_contact) {
                    Translation::where('slug', '=', 'sl_contact')->update(['value' => $request->sl_contact ? $request->sl_contact : $request->pl_contact]);

                }elseif ($item->slug == 'pl_campaign_title' && $item->value != $request->pl_campaign_title) {
                    Translation::where('slug', '=', 'pl_campaign_title')->update(['value' => $request->pl_campaign_title]);

                }elseif ($item->slug == 'sl_campaign_title' && $item->value != $request->sl_campaign_title) {
                    Translation::where('slug', '=', 'sl_campaign_title')->update(['value' => $request->sl_campaign_title ? $request->sl_campaign_title : $request->pl_campaign_title]);

                }elseif ($item->slug == 'pl_campaign_subtitle' && $item->value != $request->pl_campaign_subtitle) {
                    Translation::where('slug', '=', 'pl_campaign_subtitle')->update(['value' => $request->pl_campaign_subtitle]);

                }elseif ($item->slug == 'sl_campaign_subtitle' && $item->value != $request->sl_campaign_subtitle) {
                    Translation::where('slug', '=', 'sl_campaign_subtitle')->update(['value' => $request->sl_campaign_subtitle ? $request->sl_campaign_subtitle : $request->pl_campaign_subtitle]);

                }elseif ($item->slug == 'pl_our_leader_title' && $item->value != $request->pl_our_leader_title) {
                    Translation::where('slug', '=', 'pl_our_leader_title')->update(['value' => $request->pl_our_leader_title]);

                }elseif ($item->slug == 'sl_our_leader_title' && $item->value != $request->sl_our_leader_title) {
                    Translation::where('slug', '=', 'sl_our_leader_title')->update(['value' => $request->sl_our_leader_title ? $request->sl_our_leader_title : $request->pl_our_leader_title]);

                }elseif ($item->slug == 'pl_our_leader_subtitle' && $item->value != $request->pl_our_leader_subtitle) {
                    Translation::where('slug', '=', 'pl_our_leader_subtitle')->update(['value' => $request->pl_our_leader_subtitle]);

                }elseif ($item->slug == 'sl_our_leader_subtitle' && $item->value != $request->sl_our_leader_subtitle) {
                    Translation::where('slug', '=', 'sl_our_leader_subtitle')->update(['value' => $request->sl_our_leader_subtitle ? $request->sl_our_leader_subtitle : $request->pl_our_leader_subtitle]);

                }elseif ($item->slug == 'pl_feedback_title' && $item->value != $request->pl_feedback_title) {
                    Translation::where('slug', '=', 'pl_feedback_title')->update(['value' => $request->pl_feedback_title]);

                }elseif ($item->slug == 'sl_feedback_title' && $item->value != $request->sl_feedback_title) {
                    Translation::where('slug', '=', 'sl_feedback_title')->update(['value' => $request->sl_feedback_title ? $request->sl_feedback_title : $request->pl_feedback_title]);

                }elseif ($item->slug == 'pl_feedback_subtitle' && $item->value != $request->pl_feedback_subtitle) {
                    Translation::where('slug', '=', 'pl_feedback_subtitle')->update(['value' => $request->pl_feedback_subtitle]);

                }elseif ($item->slug == 'sl_feedback_subtitle' && $item->value != $request->sl_feedback_subtitle) {
                    Translation::where('slug', '=', 'sl_feedback_subtitle')->update(['value' => $request->sl_feedback_subtitle ? $request->sl_feedback_subtitle : $request->pl_feedback_subtitle]);

                }elseif ($item->slug == 'pl_news_title' && $item->value != $request->pl_news_title) {
                    Translation::where('slug', '=', 'pl_news_title')->update(['value' => $request->pl_news_title]);

                }elseif ($item->slug == 'sl_news_title' && $item->value != $request->sl_news_title) {
                    Translation::where('slug', '=', 'sl_news_title')->update(['value' => $request->sl_news_title ? $request->sl_news_title : $request->pl_news_title]);

                }elseif ($item->slug == 'pl_news_subtitle' && $item->value != $request->pl_news_subtitle) {
                    Translation::where('slug', '=', 'pl_news_subtitle')->update(['value' => $request->pl_news_subtitle]);

                }elseif ($item->slug == 'sl_news_subtitle' && $item->value != $request->sl_news_subtitle) {
                    Translation::where('slug', '=', 'sl_news_subtitle')->update(['value' => $request->sl_news_subtitle ? $request->sl_news_subtitle : $request->pl_news_subtitle]);

                }elseif ($item->slug == 'pl_partner_title' && $item->value != $request->pl_partner_title) {
                    Translation::where('slug', '=', 'pl_partner_title')->update(['value' => $request->pl_partner_title]);

                }elseif ($item->slug == 'sl_partner_title' && $item->value != $request->sl_partner_title) {
                    Translation::where('slug', '=', 'sl_partner_title')->update(['value' => $request->sl_partner_title ? $request->sl_partner_title : $request->pl_partner_title]);

                }elseif ($item->slug == 'pl_partner_subtitle' && $item->value != $request->pl_partner_subtitle) {
                    Translation::where('slug', '=', 'pl_partner_subtitle')->update(['value' => $request->pl_partner_subtitle]);

                }elseif ($item->slug == 'sl_partner_subtitle' && $item->value != $request->sl_partner_subtitle) {
                    Translation::where('slug', '=', 'sl_partner_subtitle')->update(['value' => $request->sl_partner_subtitle ? $request->sl_partner_subtitle : $request->pl_partner_subtitle]);

                }elseif ($item->slug == 'pl_signup' && $item->value != $request->pl_signup) {
                    Translation::where('slug', '=', 'pl_signup')->update(['value' => $request->pl_signup]);

                }elseif ($item->slug == 'sl_signup' && $item->value != $request->sl_signup) {
                    Translation::where('slug', '=', 'sl_signup')->update(['value' => $request->sl_signup ? $request->sl_signup : $request->pl_signup]);

                }elseif ($item->slug == 'pl_signin' && $item->value != $request->pl_signin) {
                    Translation::where('slug', '=', 'pl_signin')->update(['value' => $request->pl_signin]);

                }elseif ($item->slug == 'sl_signin' && $item->value != $request->sl_signin) {
                    Translation::where('slug', '=', 'sl_signin')->update(['value' => $request->sl_signin ? $request->sl_signin : $request->pl_signin]);

                }elseif ($item->slug == 'pl_campaign' && $item->value != $request->pl_campaign) {
                    Translation::where('slug', '=', 'pl_campaign')->update(['value' => $request->pl_campaign]);

                }elseif ($item->slug == 'sl_campaign' && $item->value != $request->sl_campaign) {
                    Translation::where('slug', '=', 'sl_campaign')->update(['value' => $request->sl_campaign ? $request->sl_campaign : $request->pl_campaign]);

                }elseif ($item->slug == 'pl_dashboard' && $item->value != $request->pl_dashboard) {
                    Translation::where('slug', '=', 'pl_dashboard')->update(['value' => $request->pl_dashboard]);

                }elseif ($item->slug == 'sl_dashboard' && $item->value != $request->sl_dashboard) {
                    Translation::where('slug', '=', 'sl_dashboard')->update(['value' => $request->sl_dashboard ? $request->sl_dashboard : $request->pl_dashboard]);

                }elseif ($item->slug == 'pl_my_campaign' && $item->value != $request->pl_my_campaign) {
                    Translation::where('slug', '=', 'pl_my_campaign')->update(['value' => $request->pl_my_campaign]);

                }elseif ($item->slug == 'sl_my_campaign' && $item->value != $request->sl_my_campaign) {
                    Translation::where('slug', '=', 'sl_my_campaign')->update(['value' => $request->sl_my_campaign ? $request->sl_my_campaign : $request->pl_my_campaign]);

                }elseif ($item->slug == 'pl_payment' && $item->value != $request->pl_payment) {
                    Translation::where('slug', '=', 'pl_payment')->update(['value' => $request->pl_payment]);

                }elseif ($item->slug == 'sl_payment' && $item->value != $request->sl_payment) {
                    Translation::where('slug', '=', 'sl_payment')->update(['value' => $request->sl_payment ? $request->sl_payment : $request->pl_payment]);

                }
            }

            toast('Language has been successfully updated', 'success');
            return redirect()->back();
        }
        $tran = Translation();
        return view('admin.translation.home', ['tran' => $tran, 'menu'=> 'Language', 'page_title' => 'Home']);
    }

   # about page
   public function about(Request $request)
   {
       if ($request->isMethod('POST')) {

           $data = Translation::get();

           foreach ($data as $item) {

               if ($item->slug == 'pl_about_us_title' && $item->value != $request->pl_about_us_title) {
                   Translation::where('slug', '=', 'pl_about_us_title')->update(['value' => $request->pl_about_us_title]);

               }elseif ($item->slug == 'sl_about_us_title' && $item->value != $request->sl_about_us_title) {
                   Translation::where('slug', '=', 'sl_about_us_title')->update(['value' => $request->sl_about_us_title ? $request->sl_about_us_title : $request->pl_about_us_title]);

               }elseif ($item->slug == 'pl_our_journey_title' && $item->value != $request->pl_our_journey_title) {
                   Translation::where('slug', '=', 'pl_our_journey_title')->update(['value' => $request->pl_our_journey_title]);

               }elseif ($item->slug == 'sl_our_journey_title' && $item->value != $request->sl_our_journey_title) {
                   Translation::where('slug', '=', 'sl_our_journey_title')->update(['value' => $request->sl_our_journey_title ? $request->sl_our_journey_title : $request->pl_our_journey_title]);

               }elseif ($item->slug == 'pl_our_journey_subtitle' && $item->value != $request->pl_our_journey_subtitle) {
                   Translation::where('slug', '=', 'pl_our_journey_subtitle')->update(['value' => $request->pl_our_journey_subtitle]);

               }elseif ($item->slug == 'sl_pages' && $item->value != $request->sl_pages) {
                   Translation::where('slug', '=', 'sl_our_journey_subtitle')->update(['value' => $request->sl_our_journey_subtitle ? $request->sl_our_journey_subtitle : $request->pl_our_journey_subtitle]);

               }elseif ($item->slug == 'pl_first_stage' && $item->value != $request->pl_first_stage) {
                   Translation::where('slug', '=', 'pl_first_stage')->update(['value' => $request->pl_first_stage]);

               }elseif ($item->slug == 'sl_first_stage' && $item->value != $request->sl_first_stage) {
                   Translation::where('slug', '=', 'sl_first_stage')->update(['value' => $request->sl_first_stage ? $request->sl_first_stage : $request->pl_first_stage]);

               }elseif ($item->slug == 'pl_second_stage' && $item->value != $request->pl_second_stage) {
                   Translation::where('slug', '=', 'pl_second_stage')->update(['value' => $request->pl_second_stage]);

               }elseif ($item->slug == 'sl_second_stage' && $item->value != $request->sl_second_stage) {
                   Translation::where('slug', '=', 'sl_second_stage')->update(['value' => $request->sl_second_stage ? $request->sl_second_stage : $request->pl_second_stage]);

               }elseif ($item->slug == 'pl_third_stage' && $item->value != $request->pl_third_stage) {
                   Translation::where('slug', '=', 'pl_third_stage')->update(['value' => $request->pl_third_stage]);

               }elseif ($item->slug == 'sl_third_stage' && $item->value != $request->sl_third_stage) {
                   Translation::where('slug', '=', 'sl_third_stage')->update(['value' => $request->sl_third_stage ? $request->sl_third_stage : $request->pl_third_stage]);

               }elseif ($item->slug == 'pl_fourth_stage' && $item->value != $request->pl_fourth_stage) {
                   Translation::where('slug', '=', 'pl_fourth_stage')->update(['value' => $request->pl_fourth_stage]);

               }elseif ($item->slug == 'sl_fourth_stage' && $item->value != $request->sl_fourth_stage) {
                   Translation::where('slug', '=', 'sl_fourth_stage')->update(['value' => $request->sl_fourth_stage ? $request->sl_fourth_stage : $request->pl_fourth_stage]);

               }elseif ($item->slug == 'pl_fifth_stage' && $item->value != $request->pl_fifth_stage) {
                   Translation::where('slug', '=', 'pl_fifth_stage')->update(['value' => $request->pl_fifth_stage]);

               }elseif ($item->slug == 'sl_fifth_stage' && $item->value != $request->sl_fifth_stage) {
                   Translation::where('slug', '=', 'sl_fifth_stage')->update(['value' => $request->sl_fifth_stage ? $request->sl_fifth_stage : $request->pl_fifth_stage]);

               }
           }

           toast('Language has been successfully updated', 'success');
           return redirect()->back();
       }
       $tran = Translation();
       return view('admin.translation.about', ['tran' => $tran,'menu'=> 'Language', 'page_title' => 'About']);
   }

    # blog page
    public function blog(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = Translation::get();

            foreach ($data as $item) {

                if ($item->slug == 'pl_blog_page_title' && $item->value != $request->pl_blog_page_title) {
                    Translation::where('slug', '=', 'pl_blog_page_title')->update(['value' => $request->pl_blog_page_title]);

                }elseif ($item->slug == 'sl_blog_page_title' && $item->value != $request->sl_blog_page_title) {
                    Translation::where('slug', '=', 'sl_blog_page_title')->update(['value' => $request->sl_blog_page_title ? $request->sl_blog_page_title : $request->pl_blog_page_title]);

                }elseif ($item->slug == 'pl_post_categories' && $item->value != $request->pl_post_categories) {
                    Translation::where('slug', '=', 'pl_post_categories')->update(['value' => $request->pl_post_categories]);

                }elseif ($item->slug == 'sl_post_categories' && $item->value != $request->sl_post_categories) {
                    Translation::where('slug', '=', 'sl_post_categories')->update(['value' => $request->sl_post_categories ? $request->sl_post_categories : $request->pl_post_categories]);

                }elseif ($item->slug == 'pl_popular_post' && $item->value != $request->pl_popular_post) {
                    Translation::where('slug', '=', 'pl_popular_post')->update(['value' => $request->pl_popular_post]);

                }elseif ($item->slug == 'sl_popular_post' && $item->value != $request->sl_popular_post) {
                    Translation::where('slug', '=', 'sl_popular_post')->update(['value' => $request->sl_popular_post ? $request->sl_popular_post : $request->pl_popular_post]);

                }elseif ($item->slug == 'pl_post_tag' && $item->value != $request->pl_post_tag) {
                    Translation::where('slug', '=', 'pl_post_tag')->update(['value' => $request->pl_post_tag]);

                }elseif ($item->slug == 'sl_post_tag' && $item->value != $request->sl_post_tag) {
                    Translation::where('slug', '=', 'sl_post_tag')->update(['value' => $request->sl_post_tag ? $request->sl_post_tag : $request->pl_post_tag]);

                }elseif ($item->slug == 'pl_search_keywords' && $item->value != $request->pl_search_keywords) {
                    Translation::where('slug', '=', 'pl_search_keywords')->update(['value' => $request->pl_search_keywords]);

                }elseif ($item->slug == 'sl_search_keywords' && $item->value != $request->sl_search_keywords) {
                    Translation::where('slug', '=', 'sl_search_keywords')->update(['value' => $request->sl_search_keywords ? $request->sl_search_keywords : $request->pl_search_keywords]);

                }elseif ($item->slug == 'pl_blog_details' && $item->value != $request->pl_blog_details) {
                    Translation::where('slug', '=', 'pl_blog_details')->update(['value' => $request->pl_blog_details]);

                }elseif ($item->slug == 'sl_blog_details' && $item->value != $request->sl_blog_details) {
                    Translation::where('slug', '=', 'sl_blog_details')->update(['value' => $request->sl_blog_details ? $request->sl_blog_details : $request->pl_blog_details]);

                }elseif ($item->slug == 'pl_related_blog' && $item->value != $request->pl_related_blog) {
                    Translation::where('slug', '=', 'pl_related_blog')->update(['value' => $request->pl_related_blog]);

                }elseif ($item->slug == 'sl_related_blog' && $item->value != $request->sl_related_blog) {
                    Translation::where('slug', '=', 'sl_related_blog')->update(['value' => $request->sl_related_blog ? $request->sl_related_blog : $request->pl_related_blog]);

                }elseif ($item->slug == 'pl_author' && $item->value != $request->pl_author) {
                    Translation::where('slug', '=', 'pl_author')->update(['value' => $request->pl_author]);

                }elseif ($item->slug == 'sl_author' && $item->value != $request->sl_author) {
                    Translation::where('slug', '=', 'sl_author')->update(['value' => $request->sl_author ? $request->sl_author : $request->pl_author]);

                }elseif ($item->slug == 'pl_comment_here' && $item->value != $request->pl_comment_here) {
                    Translation::where('slug', '=', 'pl_comment_here')->update(['value' => $request->pl_comment_here]);

                }elseif ($item->slug == 'sl_comment_here' && $item->value != $request->sl_comment_here) {
                    Translation::where('slug', '=', 'sl_comment_here')->update(['value' => $request->sl_comment_here ? $request->sl_comment_here : $request->pl_comment_here]);

                }elseif ($item->slug == 'pl_comment' && $item->value != $request->pl_comment) {
                    Translation::where('slug', '=', 'pl_comment')->update(['value' => $request->pl_comment]);

                }elseif ($item->slug == 'sl_comment' && $item->value != $request->sl_comment) {
                    Translation::where('slug', '=', 'sl_comment')->update(['value' => $request->sl_comment ? $request->sl_comment : $request->pl_comment]);

                }elseif ($item->slug == 'pl_created_on' && $item->value != $request->pl_created_on) {
                    Translation::where('slug', '=', 'pl_created_on')->update(['value' => $request->pl_created_on]);

                }elseif ($item->slug == 'sl_created_on' && $item->value != $request->sl_created_on) {
                    Translation::where('slug', '=', 'sl_created_on')->update(['value' => $request->sl_created_on ? $request->sl_created_on : $request->pl_created_on]);

                }
            }

            toast('Language has been successfully updated', 'success');
            return redirect()->back();
        }
        $tran = Translation();
        return view('admin.translation.blog', ['tran' => $tran,'menu'=> 'Language', 'page_title' => 'Blog']);
    }


    # blog page
    public function signinSignup(Request $request)
    {
        if ($request->isMethod('POST')) {
            # image upload to general settings table

            $settings = GeneralSettings::get();

            foreach ($settings as $settItem) {

                if ($settItem->slug == 'signup_image' && $settItem->value != $request->signup_image) {

                    if (!empty($request->signup_image)) {

                        $old_image = asset(path_image().$settItem->value);
                        $new_image = $request->signup_image;
                        $signup_image = fileUpload($new_image, path_image(), $old_image);

                        GeneralSettings::where('slug', '=', 'signup_image')->update(['value' => path_image().$signup_image]);
                    }

                }elseif ($settItem->slug == 'signin_image' && $settItem->value != $request->signin_image) {

                    if (!empty($request->signin_image)) {

                        $old_image = asset(path_image().$settItem->value);
                        $new_image = $request->signin_image;
                        $signin_image = fileUpload($new_image, path_image(), $old_image);

                        GeneralSettings::where('slug', '=', 'signin_image')->update(['value' => path_image().$signin_image]);
                    }

                }elseif ($settItem->slug == 'password_image' && $settItem->value != $request->password_image) {

                    if (!empty($request->password_image)) {

                        $old_image = asset(path_image().$settItem->value);
                        $new_image = $request->password_image;
                        $password_image = fileUpload($new_image, path_image(), $old_image);

                        GeneralSettings::where('slug', '=', 'password_image')->update(['value' => path_image().$password_image]);
                    }

                }
            }
            # end image upload

            $data = Translation::get();

            foreach ($data as $item) {

                if ($item->slug == 'pl_first_name' && $item->value != $request->pl_first_name) {
                    Translation::where('slug', '=', 'pl_first_name')->update(['value' => $request->pl_first_name]);

                }elseif ($item->slug == 'sl_first_name' && $item->value != $request->sl_first_name) {
                    Translation::where('slug', '=', 'sl_first_name')->update(['value' => $request->sl_first_name ? $request->sl_first_name : $request->pl_first_name]);

                }elseif ($item->slug == 'pl_last_name' && $item->value != $request->pl_last_name) {
                    Translation::where('slug', '=', 'pl_last_name')->update(['value' => $request->pl_last_name]);

                }elseif ($item->slug == 'sl_last_name' && $item->value != $request->sl_last_name) {
                    Translation::where('slug', '=', 'sl_last_name')->update(['value' => $request->sl_last_name ? $request->sl_last_name : $request->pl_last_name]);

                }elseif ($item->slug == 'pl_email' && $item->value != $request->pl_email) {
                    Translation::where('slug', '=', 'pl_email')->update(['value' => $request->pl_email]);

                }elseif ($item->slug == 'sl_email' && $item->value != $request->sl_email) {
                    Translation::where('slug', '=', 'sl_email')->update(['value' => $request->sl_email ? $request->sl_email : $request->pl_email]);

                }elseif ($item->slug == 'pl_password' && $item->value != $request->pl_password) {
                    Translation::where('slug', '=', 'pl_password')->update(['value' => $request->pl_password]);

                }elseif ($item->slug == 'sl_password' && $item->value != $request->sl_password) {
                    Translation::where('slug', '=', 'sl_password')->update(['value' => $request->sl_password ? $request->sl_password : $request->pl_password]);

                }elseif ($item->slug == 'pl_repeat_password' && $item->value != $request->pl_repeat_password) {
                    Translation::where('slug', '=', 'pl_repeat_password')->update(['value' => $request->pl_repeat_password]);

                }elseif ($item->slug == 'sl_repeat_password' && $item->value != $request->sl_repeat_password) {
                    Translation::where('slug', '=', 'sl_repeat_password')->update(['value' => $request->sl_repeat_password ? $request->sl_repeat_password : $request->pl_repeat_password]);

                }elseif ($item->slug == 'pl_remember_me' && $item->value != $request->pl_remember_me) {
                    Translation::where('slug', '=', 'pl_remember_me')->update(['value' => $request->pl_remember_me]);

                }elseif ($item->slug == 'sl_remember_me' && $item->value != $request->sl_remember_me) {
                    Translation::where('slug', '=', 'sl_remember_me')->update(['value' => $request->sl_remember_me ? $request->sl_remember_me : $request->pl_remember_me]);

                }elseif ($item->slug == 'pl_signin' && $item->value != $request->pl_signin) {
                    Translation::where('slug', '=', 'pl_signin')->update(['value' => $request->pl_signin]);

                }elseif ($item->slug == 'sl_signin' && $item->value != $request->sl_signin) {
                    Translation::where('slug', '=', 'sl_signin')->update(['value' => $request->sl_signin ? $request->sl_signin : $request->pl_signin]);

                }elseif ($item->slug == 'pl_signup' && $item->value != $request->pl_signup) {
                    Translation::where('slug', '=', 'pl_signup')->update(['value' => $request->pl_signup]);

                }elseif ($item->slug == 'sl_signup' && $item->value != $request->sl_signup) {
                    Translation::where('slug', '=', 'sl_signup')->update(['value' => $request->sl_signup ? $request->sl_signup : $request->pl_signup]);

                }elseif ($item->slug == 'pl_create_account' && $item->value != $request->pl_create_account) {
                    Translation::where('slug', '=', 'pl_create_account')->update(['value' => $request->pl_create_account]);

                }elseif ($item->slug == 'sl_create_account' && $item->value != $request->sl_create_account) {
                    Translation::where('slug', '=', 'sl_create_account')->update(['value' => $request->sl_create_account ? $request->sl_create_account : $request->pl_create_account]);

                }elseif ($item->slug == 'pl_have_account' && $item->value != $request->pl_have_account) {
                    Translation::where('slug', '=', 'pl_have_account')->update(['value' => $request->pl_have_account]);

                }elseif ($item->slug == 'sl_have_account' && $item->value != $request->sl_have_account) {
                    Translation::where('slug', '=', 'sl_have_account')->update(['value' => $request->sl_have_account ? $request->sl_have_account : $request->pl_have_account]);

                }elseif ($item->slug == 'pl_havent_account' && $item->value != $request->pl_havent_account) {
                    Translation::where('slug', '=', 'pl_havent_account')->update(['value' => $request->pl_havent_account]);

                }elseif ($item->slug == 'sl_havent_account' && $item->value != $request->sl_havent_account) {
                    Translation::where('slug', '=', 'sl_havent_account')->update(['value' => $request->sl_havent_account ? $request->sl_havent_account : $request->pl_havent_account]);

                }elseif ($item->slug == 'pl_forget_password' && $item->value != $request->pl_forget_password) {
                    Translation::where('slug', '=', 'pl_forget_password')->update(['value' => $request->pl_forget_password]);

                }elseif ($item->slug == 'sl_forget_password' && $item->value != $request->sl_forget_password) {
                    Translation::where('slug', '=', 'sl_forget_password')->update(['value' => $request->sl_forget_password ? $request->sl_forget_password : $request->pl_forget_password]);

                }elseif ($item->slug == 'pl_read_t_c' && $item->value != $request->pl_read_t_c) {
                    Translation::where('slug', '=', 'pl_read_t_c')->update(['value' => $request->pl_read_t_c]);

                }elseif ($item->slug == 'sl_read_t_c' && $item->value != $request->sl_read_t_c) {
                    Translation::where('slug', '=', 'sl_read_t_c')->update(['value' => $request->sl_read_t_c ? $request->sl_read_t_c : $request->pl_read_t_c]);

                }elseif ($item->slug == 'pl_welcome_title' && $item->value != $request->pl_welcome_title) {
                    Translation::where('slug', '=', 'pl_welcome_title')->update(['value' => $request->pl_welcome_title]);

                }elseif ($item->slug == 'sl_welcome_title' && $item->value != $request->sl_welcome_title) {
                    Translation::where('slug', '=', 'sl_welcome_title')->update(['value' => $request->sl_welcome_title ? $request->sl_welcome_title : $request->pl_welcome_title]);

                }elseif ($item->slug == 'pl_welcome_subtitle' && $item->value != $request->pl_welcome_subtitle) {
                    Translation::where('slug', '=', 'pl_welcome_subtitle')->update(['value' => $request->pl_welcome_subtitle]);

                }elseif ($item->slug == 'sl_welcome_subtitle' && $item->value != $request->sl_welcome_subtitle) {
                    Translation::where('slug', '=', 'sl_welcome_subtitle')->update(['value' => $request->sl_welcome_subtitle ? $request->sl_welcome_subtitle : $request->pl_welcome_subtitle]);

                }elseif ($item->slug == 'pl_phone' && $item->value != $request->pl_phone) {
                    Translation::where('slug', '=', 'pl_phone')->update(['value' => $request->pl_phone]);

                }elseif ($item->slug == 'sl_phone' && $item->value != $request->sl_phone) {
                    Translation::where('slug', '=', 'sl_phone')->update(['value' => $request->sl_phone ? $request->sl_phone : $request->pl_phone]);

                }elseif ($item->slug == 'pl_message' && $item->value != $request->pl_message) {
                    Translation::where('slug', '=', 'pl_message')->update(['value' => $request->pl_message]);

                }elseif ($item->slug == 'sl_message' && $item->value != $request->sl_message) {
                    Translation::where('slug', '=', 'sl_message')->update(['value' => $request->sl_message ? $request->sl_message : $request->pl_message]);

                }elseif ($item->slug == 'pl_send' && $item->value != $request->pl_send) {
                    Translation::where('slug', '=', 'pl_send')->update(['value' => $request->pl_send]);

                }elseif ($item->slug == 'sl_send' && $item->value != $request->sl_send) {
                    Translation::where('slug', '=', 'sl_send')->update(['value' => $request->sl_send ? $request->sl_send : $request->pl_send]);

                }
            }

            toast('Language has been successfully updated', 'success');
            return redirect()->back();
        }
        $tran = Translation();
        return view('admin.translation.signin_signup', ['tran' => $tran,'menu'=> 'Language', 'page_title' => 'Signin Signup']);
    }

     # profile page

     public function profile(Request $request)
     {
         if ($request->isMethod('POST')) {

             $data = Translation::get();
             foreach ($data as $item) {

                 if ($item->slug == 'pl_profile' && $item->value != $request->pl_profile) {
                     Translation::where('slug', '=', 'pl_profile')->update(['value' => $request->pl_profile]);

                 }elseif ($item->slug == 'sl_profile' && $item->value != $request->sl_profile) {
                     Translation::where('slug', '=', 'sl_profile')->update(['value' => $request->sl_profile ? $request->sl_profile : $request->pl_profile]);

                 }elseif ($item->slug == 'pl_gender' && $item->value != $request->pl_gender) {
                     Translation::where('slug', '=', 'pl_gender')->update(['value' => $request->pl_gender]);

                 }elseif ($item->slug == 'sl_gender' && $item->value != $request->sl_gender) {
                     Translation::where('slug', '=', 'sl_gender')->update(['value' => $request->sl_gender ? $request->sl_gender : $request->pl_gender]);

                 }elseif ($item->slug == 'pl_address' && $item->value != $request->pl_address) {
                     Translation::where('slug', '=', 'pl_address')->update(['value' => $request->pl_address]);

                 }elseif ($item->slug == 'sl_address' && $item->value != $request->sl_address) {
                     Translation::where('slug', '=', 'sl_address')->update(['value' => $request->sl_address ? $request->sl_address : $request->pl_address]);

                 }elseif ($item->slug == 'pl_country' && $item->value != $request->pl_country) {
                     Translation::where('slug', '=', 'pl_country')->update(['value' => $request->pl_country]);

                 }elseif ($item->slug == 'sl_country' && $item->value != $request->sl_country) {
                     Translation::where('slug', '=', 'sl_country')->update(['value' => $request->sl_country ? $request->sl_country : $request->pl_country]);

                 }elseif ($item->slug == 'pl_member_since' && $item->value != $request->pl_member_since) {
                     Translation::where('slug', '=', 'pl_member_since')->update(['value' => $request->pl_member_since]);

                 }elseif ($item->slug == 'sl_member_since' && $item->value != $request->sl_member_since) {
                     Translation::where('slug', '=', 'sl_member_since')->update(['value' => $request->sl_member_since ? $request->sl_member_since : $request->pl_member_since]);

                 }elseif ($item->slug == 'pl_status' && $item->value != $request->pl_status) {
                     Translation::where('slug', '=', 'pl_status')->update(['value' => $request->pl_status]);

                 }elseif ($item->slug == 'sl_status' && $item->value != $request->sl_status) {
                     Translation::where('slug', '=', 'sl_status')->update(['value' => $request->sl_status ? $request->sl_status : $request->pl_status]);

                 }elseif ($item->slug == 'pl_contributed' && $item->value != $request->pl_contributed) {
                     Translation::where('slug', '=', 'pl_contributed')->update(['value' => $request->pl_contributed]);

                 }elseif ($item->slug == 'sl_contributed' && $item->value != $request->sl_contributed) {
                     Translation::where('slug', '=', 'sl_contributed')->update(['value' => $request->sl_contributed ? $request->sl_contributed : $request->pl_contributed]);

                 }elseif ($item->slug == 'pl_deactive_account' && $item->value != $request->pl_deactive_account) {
                     Translation::where('slug', '=', 'pl_deactive_account')->update(['value' => $request->pl_deactive_account]);

                 }elseif ($item->slug == 'sl_deactive_account' && $item->value != $request->sl_deactive_account) {
                     Translation::where('slug', '=', 'sl_deactive_account')->update(['value' => $request->sl_deactive_account ? $request->sl_deactive_account : $request->pl_deactive_account]);

                 }elseif ($item->slug == 'pl_change_password' && $item->value != $request->pl_change_password) {
                     Translation::where('slug', '=', 'pl_change_password')->update(['value' => $request->pl_change_password]);

                 }elseif ($item->slug == 'sl_change_password' && $item->value != $request->sl_change_password) {
                     Translation::where('slug', '=', 'sl_change_password')->update(['value' => $request->sl_change_password ? $request->sl_change_password : $request->pl_change_password]);

                 }elseif ($item->slug == 'pl_start_campaign' && $item->value != $request->pl_start_campaign) {
                     Translation::where('slug', '=', 'pl_start_campaign')->update(['value' => $request->pl_start_campaign]);

                 }elseif ($item->slug == 'sl_start_campaign' && $item->value != $request->sl_start_campaign) {
                     Translation::where('slug', '=', 'sl_start_campaign')->update(['value' => $request->sl_start_campaign ? $request->sl_start_campaign : $request->pl_start_campaign]);

                 }elseif ($item->slug == 'pl_pending_campaign' && $item->value != $request->pl_pending_campaign) {
                    Translation::where('slug', '=', 'pl_pending_campaign')->update(['value' => $request->pl_pending_campaign]);

                }elseif ($item->slug == 'sl_pending_campaign' && $item->value != $request->sl_pending_campaign) {
                    Translation::where('slug', '=', 'sl_pending_campaign')->update(['value' => $request->sl_pending_campaign ? $request->sl_pending_campaign : $request->pl_pending_campaign]);

                }elseif ($item->slug == 'pl_backed_campaign' && $item->value != $request->pl_backed_campaign) {
                    Translation::where('slug', '=', 'pl_backed_campaign')->update(['value' => $request->pl_backed_campaign]);

                }elseif ($item->slug == 'sl_backed_campaign' && $item->value != $request->sl_backed_campaign) {
                    Translation::where('slug', '=', 'sl_backed_campaign')->update(['value' => $request->sl_backed_campaign ? $request->sl_backed_campaign : $request->pl_backed_campaign]);

                }elseif ($item->slug == 'pl_active' && $item->value != $request->pl_active) {
                    Translation::where('slug', '=', 'pl_active')->update(['value' => $request->pl_active]);

                }elseif ($item->slug == 'sl_active' && $item->value != $request->sl_active) {
                    Translation::where('slug', '=', 'sl_active')->update(['value' => $request->sl_active ? $request->sl_active : $request->pl_active]);

                }elseif ($item->slug == 'pl_deactive' && $item->value != $request->pl_deactive) {
                    Translation::where('slug', '=', 'pl_deactive')->update(['value' => $request->pl_deactive]);

                }elseif ($item->slug == 'sl_deactive' && $item->value != $request->sl_deactive) {
                    Translation::where('slug', '=', 'sl_deactive')->update(['value' => $request->sl_deactive ? $request->sl_deactive : $request->pl_deactive]);

                }elseif ($item->slug == 'pl_suspend' && $item->value != $request->pl_suspend) {
                    Translation::where('slug', '=', 'pl_suspend')->update(['value' => $request->pl_suspend]);

                }elseif ($item->slug == 'sl_suspend' && $item->value != $request->sl_suspend) {
                    Translation::where('slug', '=', 'sl_suspend')->update(['value' => $request->sl_suspend ? $request->sl_suspend : $request->pl_suspend]);

                }elseif ($item->slug == 'pl_male' && $item->value != $request->pl_male) {
                    Translation::where('slug', '=', 'pl_male')->update(['value' => $request->pl_male]);

                }elseif ($item->slug == 'sl_male' && $item->value != $request->sl_male) {
                    Translation::where('slug', '=', 'sl_male')->update(['value' => $request->sl_male ? $request->sl_male : $request->pl_male]);

                }elseif ($item->slug == 'pl_female' && $item->value != $request->pl_female) {
                    Translation::where('slug', '=', 'pl_female')->update(['value' => $request->pl_female]);

                }elseif ($item->slug == 'sl_female' && $item->value != $request->sl_female) {
                    Translation::where('slug', '=', 'sl_female')->update(['value' => $request->sl_female ? $request->sl_female : $request->pl_female]);

                }elseif ($item->slug == 'pl_other' && $item->value != $request->pl_other) {
                    Translation::where('slug', '=', 'pl_other')->update(['value' => $request->pl_other]);

                }elseif ($item->slug == 'sl_other' && $item->value != $request->sl_other) {
                    Translation::where('slug', '=', 'sl_other')->update(['value' => $request->sl_other ? $request->sl_other : $request->pl_other]);

                }elseif ($item->slug == 'pl_title' && $item->value != $request->pl_title) {
                    Translation::where('slug', '=', 'pl_title')->update(['value' => $request->pl_title]);

                }elseif ($item->slug == 'sl_title' && $item->value != $request->sl_title) {
                    Translation::where('slug', '=', 'sl_title')->update(['value' => $request->sl_title ? $request->sl_title : $request->pl_title]);

                }elseif ($item->slug == 'pl_details' && $item->value != $request->pl_details) {
                    Translation::where('slug', '=', 'pl_details')->update(['value' => $request->pl_details]);

                }elseif ($item->slug == 'sl_details' && $item->value != $request->sl_details) {
                    Translation::where('slug', '=', 'sl_details')->update(['value' => $request->sl_details ? $request->sl_details : $request->pl_details]);

                }elseif ($item->slug == 'pl_goal' && $item->value != $request->pl_goal) {
                    Translation::where('slug', '=', 'pl_goal')->update(['value' => $request->pl_goal]);

                }elseif ($item->slug == 'sl_goal' && $item->value != $request->sl_goal) {
                    Translation::where('slug', '=', 'sl_goal')->update(['value' => $request->sl_goal ? $request->sl_goal : $request->pl_goal]);

                }elseif ($item->slug == 'pl_raised' && $item->value != $request->pl_raised) {
                    Translation::where('slug', '=', 'pl_raised')->update(['value' => $request->pl_raised]);

                }elseif ($item->slug == 'sl_raised' && $item->value != $request->sl_raised) {
                    Translation::where('slug', '=', 'sl_raised')->update(['value' => $request->sl_raised ? $request->sl_raised : $request->pl_raised]);

                }elseif ($item->slug == 'pl_prefilled_amount' && $item->value != $request->pl_prefilled_amount) {
                    Translation::where('slug', '=', 'pl_prefilled_amount')->update(['value' => $request->pl_prefilled_amount]);

                }elseif ($item->slug == 'sl_prefilled_amount' && $item->value != $request->sl_prefilled_amount) {
                    Translation::where('slug', '=', 'sl_prefilled_amount')->update(['value' => $request->sl_prefilled_amount ? $request->sl_prefilled_amount : $request->pl_prefilled_amount]);

                }elseif ($item->slug == 'pl_campaign_method' && $item->value != $request->pl_campaign_method) {
                    Translation::where('slug', '=', 'pl_campaign_method')->update(['value' => $request->pl_campaign_method]);

                }elseif ($item->slug == 'sl_campaign_method' && $item->value != $request->sl_campaign_method) {
                    Translation::where('slug', '=', 'sl_campaign_method')->update(['value' => $request->sl_campaign_method ? $request->sl_campaign_method : $request->pl_campaign_method]);

                }elseif ($item->slug == 'pl_start_date' && $item->value != $request->pl_start_date) {
                    Translation::where('slug', '=', 'pl_start_date')->update(['value' => $request->pl_start_date]);

                }elseif ($item->slug == 'sl_start_date' && $item->value != $request->sl_start_date) {
                    Translation::where('slug', '=', 'sl_start_date')->update(['value' => $request->sl_start_date ? $request->sl_start_date : $request->pl_start_date]);

                }elseif ($item->slug == 'pl_end_date' && $item->value != $request->pl_end_date) {
                    Translation::where('slug', '=', 'pl_end_date')->update(['value' => $request->pl_end_date]);

                }elseif ($item->slug == 'sl_end_date' && $item->value != $request->sl_end_date) {
                    Translation::where('slug', '=', 'sl_end_date')->update(['value' => $request->sl_end_date ? $request->sl_end_date : $request->pl_end_date]);

                }elseif ($item->slug == 'pl_video' && $item->value != $request->pl_video) {
                    Translation::where('slug', '=', 'pl_video')->update(['value' => $request->pl_video]);

                }elseif ($item->slug == 'sl_video' && $item->value != $request->sl_video) {
                    Translation::where('slug', '=', 'sl_video')->update(['value' => $request->sl_video ? $request->sl_video : $request->pl_video]);

                }elseif ($item->slug == 'pl_featured_image' && $item->value != $request->pl_featured_image) {
                    Translation::where('slug', '=', 'pl_featured_image')->update(['value' => $request->pl_featured_image]);

                }elseif ($item->slug == 'sl_featured_image' && $item->value != $request->sl_featured_image) {
                    Translation::where('slug', '=', 'sl_featured_image')->update(['value' => $request->sl_featured_image ? $request->sl_featured_image : $request->pl_featured_image]);

                }elseif ($item->slug == 'pl_submit' && $item->value != $request->pl_submit) {
                    Translation::where('slug', '=', 'pl_submit')->update(['value' => $request->pl_submit]);

                }elseif ($item->slug == 'sl_submit' && $item->value != $request->sl_submit) {
                    Translation::where('slug', '=', 'sl_submit')->update(['value' => $request->sl_submit ? $request->sl_submit : $request->pl_submit]);

                }elseif ($item->slug == 'pl_running_campaign' && $item->value != $request->pl_running_campaign) {
                    Translation::where('slug', '=', 'pl_running_campaign')->update(['value' => $request->pl_running_campaign]);

                }elseif ($item->slug == 'sl_running_campaign' && $item->value != $request->sl_running_campaign) {
                    Translation::where('slug', '=', 'sl_running_campaign')->update(['value' => $request->sl_running_campaign ? $request->sl_running_campaign : $request->pl_running_campaign]);

                }elseif ($item->slug == 'pl_active_campaign' && $item->value != $request->pl_active_campaign) {
                    Translation::where('slug', '=', 'pl_active_campaign')->update(['value' => $request->pl_active_campaign]);

                }elseif ($item->slug == 'sl_active_campaign' && $item->value != $request->sl_active_campaign) {
                    Translation::where('slug', '=', 'sl_active_campaign')->update(['value' => $request->sl_active_campaign ? $request->sl_active_campaign : $request->pl_active_campaign]);

                }elseif ($item->slug == 'pl_campaign_info' && $item->value != $request->pl_campaign_info) {
                    Translation::where('slug', '=', 'pl_campaign_info')->update(['value' => $request->pl_campaign_info]);

                }elseif ($item->slug == 'sl_campaign_info' && $item->value != $request->sl_campaign_info) {
                    Translation::where('slug', '=', 'sl_campaign_info')->update(['value' => $request->sl_campaign_info ? $request->pl_campaign_info : $request->pl_active_campaign]);

                }elseif ($item->slug == 'pl_document' && $item->value != $request->pl_document) {
                    Translation::where('slug', '=', 'pl_document')->update(['value' => $request->pl_document]);

                }elseif ($item->slug == 'sl_document' && $item->value != $request->sl_document) {
                    Translation::where('slug', '=', 'sl_document')->update(['value' => $request->sl_document ? $request->pl_document : $request->pl_document]);

                }elseif ($item->slug == 'pl_image' && $item->value != $request->pl_image) {
                    Translation::where('slug', '=', 'pl_image')->update(['value' => $request->pl_image]);

                }elseif ($item->slug == 'sl_image' && $item->value != $request->sl_image) {
                    Translation::where('slug', '=', 'sl_image')->update(['value' => $request->sl_image ? $request->sl_image : $request->pl_image]);

                }elseif ($item->slug == 'pl_edit_view' && $item->value != $request->pl_edit_view) {
                    Translation::where('slug', '=', 'pl_edit_view')->update(['value' => $request->pl_edit_view]);

                }elseif ($item->slug == 'sl_edit_view' && $item->value != $request->sl_edit_view) {
                    Translation::where('slug', '=', 'sl_edit_view')->update(['value' => $request->sl_edit_view ? $request->sl_edit_view : $request->pl_edit_view]);

                }elseif ($item->slug == 'pl_after_goal_achieve' && $item->value != $request->pl_after_goal_achieve) {
                    Translation::where('slug', '=', 'pl_after_goal_achieve')->update(['value' => $request->pl_after_goal_achieve]);

                }elseif ($item->slug == 'sl_after_goal_achieve' && $item->value != $request->sl_after_goal_achieve) {
                    Translation::where('slug', '=', 'sl_after_goal_achieve')->update(['value' => $request->sl_after_goal_achieve ? $request->sl_after_goal_achieve : $request->pl_after_goal_achieve]);

                }elseif ($item->slug == 'pl_after_end_date' && $item->value != $request->pl_after_end_date) {
                    Translation::where('slug', '=', 'pl_after_end_date')->update(['value' => $request->pl_after_end_date]);

                }elseif ($item->slug == 'sl_after_end_date' && $item->value != $request->sl_after_end_date) {
                    Translation::where('slug', '=', 'sl_after_end_date')->update(['value' => $request->sl_after_end_date ? $request->sl_after_end_date : $request->pl_after_end_date]);

                }elseif ($item->slug == 'pl_service_charge' && $item->value != $request->pl_service_charge) {
                    Translation::where('slug', '=', 'pl_service_charge')->update(['value' => $request->pl_service_charge]);

                }elseif ($item->slug == 'sl_service_charge' && $item->value != $request->sl_service_charge) {
                    Translation::where('slug', '=', 'sl_service_charge')->update(['value' => $request->sl_service_charge ? $request->sl_service_charge : $request->pl_service_charge]);

                }elseif ($item->slug == 'pl_total_service_charge' && $item->value != $request->pl_total_service_charge) {
                    Translation::where('slug', '=', 'pl_total_service_charge')->update(['value' => $request->pl_total_service_charge]);

                }elseif ($item->slug == 'sl_total_service_charge' && $item->value != $request->sl_total_service_charge) {
                    Translation::where('slug', '=', 'sl_total_service_charge')->update(['value' => $request->sl_total_service_charge ? $request->sl_total_service_charge : $request->pl_total_service_charge]);

                }elseif ($item->slug == 'pl_withdraw_method' && $item->value != $request->pl_withdraw_method) {
                    Translation::where('slug', '=', 'pl_withdraw_method')->update(['value' => $request->pl_withdraw_method]);

                }elseif ($item->slug == 'sl_withdraw_method' && $item->value != $request->sl_withdraw_method) {
                    Translation::where('slug', '=', 'sl_withdraw_method')->update(['value' => $request->sl_withdraw_method ? $request->sl_withdraw_method : $request->pl_withdraw_method]);

                }elseif ($item->slug == 'pl_paypal_account' && $item->value != $request->pl_paypal_account) {
                    Translation::where('slug', '=', 'pl_paypal_account')->update(['value' => $request->pl_paypal_account]);

                }elseif ($item->slug == 'sl_paypal_account' && $item->value != $request->sl_paypal_account) {
                    Translation::where('slug', '=', 'sl_paypal_account')->update(['value' => $request->sl_paypal_account ? $request->sl_paypal_account : $request->pl_paypal_account]);

                }elseif ($item->slug == 'pl_stripe_account' && $item->value != $request->pl_stripe_account) {
                    Translation::where('slug', '=', 'pl_stripe_account')->update(['value' => $request->pl_stripe_account]);

                }elseif ($item->slug == 'sl_stripe_account' && $item->value != $request->sl_stripe_account) {
                    Translation::where('slug', '=', 'sl_stripe_account')->update(['value' => $request->sl_stripe_account ? $request->sl_stripe_account : $request->pl_stripe_account]);

                }elseif ($item->slug == 'pl_select' && $item->value != $request->pl_select) {
                    Translation::where('slug', '=', 'pl_select')->update(['value' => $request->pl_select]);

                }elseif ($item->slug == 'sl_select' && $item->value != $request->sl_select) {
                    Translation::where('slug', '=', 'sl_select')->update(['value' => $request->sl_select ? $request->sl_select : $request->pl_select]);

                }elseif ($item->slug == 'pl_old_password' && $item->value != $request->pl_old_password) {
                    Translation::where('slug', '=', 'pl_old_password')->update(['value' => $request->pl_old_password]);

                }elseif ($item->slug == 'sl_old_password' && $item->value != $request->sl_old_password) {
                    Translation::where('slug', '=', 'sl_old_password')->update(['value' => $request->sl_old_password ? $request->sl_old_password : $request->pl_old_password]);

                }elseif ($item->slug == 'pl_new_password' && $item->value != $request->pl_new_password) {
                    Translation::where('slug', '=', 'pl_new_password')->update(['value' => $request->pl_new_password]);

                }elseif ($item->slug == 'sl_new_password' && $item->value != $request->sl_new_password) {
                    Translation::where('slug', '=', 'sl_new_password')->update(['value' => $request->sl_new_password ? $request->sl_new_password : $request->pl_new_password]);

                }elseif ($item->slug == 'pl_update' && $item->value != $request->pl_update) {
                    Translation::where('slug', '=', 'pl_update')->update(['value' => $request->pl_update]);

                }elseif ($item->slug == 'sl_update' && $item->value != $request->sl_update) {
                    Translation::where('slug', '=', 'sl_update')->update(['value' => $request->sl_update ? $request->sl_update : $request->pl_update]);

                }elseif ($item->slug == 'pl_donate' && $item->value != $request->pl_donate) {
                    Translation::where('slug', '=', 'pl_donate')->update(['value' => $request->pl_donate]);

                }elseif ($item->slug == 'sl_donate' && $item->value != $request->sl_donate) {
                    Translation::where('slug', '=', 'sl_donate')->update(['value' => $request->sl_donate ? $request->sl_donate : $request->pl_donate]);

                }elseif ($item->slug == 'pl_donation' && $item->value != $request->pl_donation) {
                   Translation::where('slug', '=', 'pl_donation')->update(['value' => $request->pl_donation]);

               }elseif ($item->slug == 'sl_donation' && $item->value != $request->sl_donation) {
                   Translation::where('slug', '=', 'sl_donation')->update(['value' => $request->sl_donation ? $request->sl_donation : $request->pl_donation]);

               }elseif ($item->slug == 'pl_make_donate' && $item->value != $request->pl_make_donate) {
                   Translation::where('slug', '=', 'pl_make_donate')->update(['value' => $request->pl_make_donate]);

               }elseif ($item->slug == 'sl_make_donate' && $item->value != $request->sl_make_donate) {
                   Translation::where('slug', '=', 'sl_make_donate')->update(['value' => $request->sl_make_donate ? $request->sl_make_donate : $request->pl_make_donate]);

               }elseif ($item->slug == 'pl_card_number' && $item->value != $request->pl_card_number) {
                   Translation::where('slug', '=', 'pl_card_number')->update(['value' => $request->pl_card_number]);

               }elseif ($item->slug == 'sl_card_number' && $item->value != $request->sl_card_number) {
                   Translation::where('slug', '=', 'sl_card_number')->update(['value' => $request->sl_card_number ? $request->sl_card_number : $request->pl_card_number]);

               }elseif ($item->slug == 'pl_name' && $item->value != $request->pl_name) {
                   Translation::where('slug', '=', 'pl_name')->update(['value' => $request->pl_name]);

               }elseif ($item->slug == 'sl_name' && $item->value != $request->sl_name) {
                   Translation::where('slug', '=', 'sl_name')->update(['value' => $request->sl_name ? $request->sl_name : $request->pl_name]);

               }elseif ($item->slug == 'pl_amount' && $item->value != $request->pl_amount) {
                   Translation::where('slug', '=', 'pl_amount')->update(['value' => $request->pl_amount]);

               }elseif ($item->slug == 'sl_amount' && $item->value != $request->sl_amount) {
                   Translation::where('slug', '=', 'sl_amount')->update(['value' => $request->sl_amount ? $request->sl_amount : $request->pl_amount]);

               }elseif ($item->slug == 'pl_exp_date' && $item->value != $request->pl_exp_date) {
                   Translation::where('slug', '=', 'pl_exp_date')->update(['value' => $request->pl_exp_date]);

               }elseif ($item->slug == 'sl_exp_date' && $item->value != $request->sl_exp_date) {
                   Translation::where('slug', '=', 'sl_exp_date')->update(['value' => $request->sl_exp_date ? $request->sl_exp_date : $request->pl_exp_date]);

               }elseif ($item->slug == 'pl_donars' && $item->value != $request->pl_donars) {
                   Translation::where('slug', '=', 'pl_donars')->update(['value' => $request->pl_donars]);

               }elseif ($item->slug == 'sl_donars' && $item->value != $request->sl_donars) {
                   Translation::where('slug', '=', 'sl_donars')->update(['value' => $request->sl_donars ? $request->sl_donars : $request->pl_donars]);

               }elseif ($item->slug == 'pl_copy' && $item->value != $request->pl_copy) {
                   Translation::where('slug', '=', 'pl_copy')->update(['value' => $request->pl_copy]);

               }elseif ($item->slug == 'sl_copy' && $item->value != $request->sl_copy) {
                   Translation::where('slug', '=', 'sl_copy')->update(['value' => $request->sl_copy ? $request->sl_copy : $request->pl_copy]);

               }elseif ($item->slug == 'pl_how_much' && $item->value != $request->pl_how_much) {
                   Translation::where('slug', '=', 'pl_how_much')->update(['value' => $request->pl_how_much]);

               }elseif ($item->slug == 'sl_how_much' && $item->value != $request->sl_how_much) {
                   Translation::where('slug', '=', 'sl_how_much')->update(['value' => $request->sl_how_much ? $request->sl_how_much : $request->pl_how_much]);

               }elseif ($item->slug == 'pl_select_doanate_method' && $item->value != $request->pl_select_doanate_method) {
                   Translation::where('slug', '=', 'pl_select_doanate_method')->update(['value' => $request->pl_select_doanate_method]);

               }elseif ($item->slug == 'sl_select_doanate_method' && $item->value != $request->sl_select_doanate_method) {
                   Translation::where('slug', '=', 'sl_select_doanate_method')->update(['value' => $request->sl_select_doanate_method ? $request->sl_select_doanate_method : $request->pl_select_doanate_method]);

               }elseif ($item->slug == 'pl_currency' && $item->value != $request->pl_currency) {
                   Translation::where('slug', '=', 'pl_currency')->update(['value' => $request->pl_currency]);

               }elseif ($item->slug == 'sl_currency' && $item->value != $request->sl_currency) {
                   Translation::where('slug', '=', 'sl_currency')->update(['value' => $request->sl_currency ? $request->sl_currency : $request->pl_currency]);

               }elseif ($item->slug == 'pl_action' && $item->value != $request->pl_action) {
                   Translation::where('slug', '=', 'pl_action')->update(['value' => $request->pl_action]);

               }elseif ($item->slug == 'sl_action' && $item->value != $request->sl_action) {
                   Translation::where('slug', '=', 'sl_action')->update(['value' => $request->sl_action ? $request->sl_action : $request->sl_action]);

               }elseif ($item->slug == 'pl_upload_document' && $item->value != $request->pl_upload_document) {
                   Translation::where('slug', '=', 'pl_upload_document')->update(['value' => $request->pl_upload_document]);

               }elseif ($item->slug == 'sl_upload_document' && $item->value != $request->sl_upload_document) {
                   Translation::where('slug', '=', 'sl_upload_document')->update(['value' => $request->sl_upload_document ? $request->sl_upload_document : $request->pl_upload_document]);

               }elseif ($item->slug == 'pl_upload_campaign_mage' && $item->value != $request->pl_upload_campaign_mage) {
                   Translation::where('slug', '=', 'pl_upload_campaign_mage')->update(['value' => $request->pl_upload_campaign_mage]);

               }elseif ($item->slug == 'sl_upload_campaign_mage' && $item->value != $request->sl_upload_campaign_mage) {
                   Translation::where('slug', '=', 'sl_upload_campaign_mage')->update(['value' => $request->sl_upload_campaign_mage ? $request->sl_upload_campaign_mage : $request->pl_upload_campaign_mage]);

               }elseif ($item->slug == 'pl_category' && $item->value != $request->pl_category) {
                   Translation::where('slug', '=', 'pl_category')->update(['value' => $request->pl_category]);

               }elseif ($item->slug == 'sl_category' && $item->value != $request->sl_category) {
                   Translation::where('slug', '=', 'sl_category')->update(['value' => $request->sl_category ? $request->sl_category : $request->pl_category]);

               }elseif ($item->slug == 'pl_select_category' && $item->value != $request->pl_select_category) {
                   Translation::where('slug', '=', 'pl_select_category')->update(['value' => $request->pl_select_category]);

               }elseif ($item->slug == 'sl_select_category' && $item->value != $request->sl_select_category) {
                   Translation::where('slug', '=', 'sl_select_category')->update(['value' => $request->sl_select_category ? $request->sl_select_category : $request->pl_select_category]);

               }elseif ($item->slug == 'pl_seletc_gender' && $item->value != $request->pl_seletc_gender) {
                   Translation::where('slug', '=', 'pl_seletc_gender')->update(['value' => $request->pl_seletc_gender]);

               }elseif ($item->slug == 'sl_seletc_gender' && $item->value != $request->sl_seletc_gender) {
                   Translation::where('slug', '=', 'sl_seletc_gender')->update(['value' => $request->sl_seletc_gender ? $request->sl_seletc_gender : $request->pl_seletc_gender]);

               }elseif ($item->slug == 'pl_logout' && $item->value != $request->pl_logout) {
                   Translation::where('slug', '=', 'pl_logout')->update(['value' => $request->pl_logout]);

               }elseif ($item->slug == 'sl_logout' && $item->value != $request->sl_logout) {
                   Translation::where('slug', '=', 'sl_logout')->update(['value' => $request->sl_logout ? $request->sl_logout : $request->pl_logout]);

               }elseif ($item->slug == 'pl_subscribe_now' && $item->value != $request->pl_subscribe_now) {
                   Translation::where('slug', '=', 'pl_subscribe_now')->update(['value' => $request->pl_subscribe_now]);

               }elseif ($item->slug == 'sl_subscribe_now' && $item->value != $request->sl_subscribe_now) {
                   Translation::where('slug', '=', 'sl_subscribe_now')->update(['value' => $request->sl_subscribe_now ? $request->sl_subscribe_now : $request->pl_subscribe_now]);

               }elseif ($item->slug == 'pl_send_message' && $item->value != $request->pl_send_message) {
                   Translation::where('slug', '=', 'pl_send_message')->update(['value' => $request->pl_send_message]);

               }elseif ($item->slug == 'sl_send_message' && $item->value != $request->sl_send_message) {
                   Translation::where('slug', '=', 'sl_send_message')->update(['value' => $request->sl_send_message ? $request->sl_send_message : $request->pl_send_message]);

               }elseif ($item->slug == 'pl_campaign_details' && $item->value != $request->pl_campaign_details) {
                   Translation::where('slug', '=', 'pl_campaign_details')->update(['value' => $request->pl_campaign_details]);

               }elseif ($item->slug == 'sl_campaign_details' && $item->value != $request->sl_campaign_details) {
                   Translation::where('slug', '=', 'sl_campaign_details')->update(['value' => $request->sl_campaign_details ? $request->sl_campaign_details : $request->pl_campaign_details]);

               }elseif ($item->slug == 'pl_back' && $item->value != $request->pl_back) {
                   Translation::where('slug', '=', 'pl_back')->update(['value' => $request->pl_back]);

               }elseif ($item->slug == 'sl_back' && $item->value != $request->sl_back) {
                   Translation::where('slug', '=', 'sl_back')->update(['value' => $request->sl_back ? $request->sl_back : $request->pl_back]);

               }elseif ($item->slug == 'pl_donate_now' && $item->value != $request->pl_donate_now) {
                   Translation::where('slug', '=', 'pl_donate_now')->update(['value' => $request->pl_donate_now]);

               }elseif ($item->slug == 'sl_donate_now' && $item->value != $request->sl_donate_now) {
                   Translation::where('slug', '=', 'sl_donate_now')->update(['value' => $request->sl_donate_now ? $request->sl_donate_now : $request->pl_donate_now]);

               }elseif ($item->slug == 'pl_become_doner' && $item->value != $request->pl_become_doner) {
                   Translation::where('slug', '=', 'pl_become_doner')->update(['value' => $request->pl_become_doner]);

               }elseif ($item->slug == 'sl_become_doner' && $item->value != $request->sl_become_doner) {
                   Translation::where('slug', '=', 'sl_become_doner')->update(['value' => $request->sl_become_doner ? $request->sl_become_doner : $request->pl_become_doner]);

               }elseif ($item->slug == 'pl_view_more' && $item->value != $request->pl_view_more) {
                   Translation::where('slug', '=', 'pl_view_more')->update(['value' => $request->pl_view_more]);

               }elseif ($item->slug == 'sl_view_more' && $item->value != $request->sl_view_more) {
                   Translation::where('slug', '=', 'sl_view_more')->update(['value' => $request->sl_view_more ? $request->sl_view_more : $request->pl_view_more]);

               }elseif ($item->slug == 'pl_read_more' && $item->value != $request->pl_read_more) {
                   Translation::where('slug', '=', 'pl_read_more')->update(['value' => $request->pl_read_more]);

               }elseif ($item->slug == 'sl_read_more' && $item->value != $request->sl_read_more) {
                   Translation::where('slug', '=', 'sl_read_more')->update(['value' => $request->sl_read_more ? $request->sl_read_more : $request->pl_read_more]);

               }elseif ($item->slug == 'pl_quick_link' && $item->value != $request->pl_quick_link) {
                   Translation::where('slug', '=', 'pl_quick_link')->update(['value' => $request->pl_quick_link]);

               }elseif ($item->slug == 'sl_quick_link' && $item->value != $request->sl_quick_link) {
                   Translation::where('slug', '=', 'sl_quick_link')->update(['value' => $request->sl_quick_link ? $request->sl_quick_link : $request->pl_quick_link]);

               }elseif ($item->slug == 'pl_contact_info' && $item->value != $request->pl_contact_info) {
                   Translation::where('slug', '=', 'pl_contact_info')->update(['value' => $request->pl_contact_info]);

               }elseif ($item->slug == 'sl_contact_info' && $item->value != $request->sl_contact_info) {
                   Translation::where('slug', '=', 'sl_contact_info')->update(['value' => $request->sl_contact_info ? $request->sl_contact_info : $request->pl_contact_info]);

               }elseif ($item->slug == 'pl_right_reserved' && $item->value != $request->pl_right_reserved) {
                   Translation::where('slug', '=', 'pl_right_reserved')->update(['value' => $request->pl_right_reserved]);

               }elseif ($item->slug == 'sl_right_reserved' && $item->value != $request->sl_right_reserved) {
                   Translation::where('slug', '=', 'sl_right_reserved')->update(['value' => $request->sl_right_reserved ? $request->sl_right_reserved : $request->pl_right_reserved]);

               }elseif ($item->slug == 'pl_total_collection' && $item->value != $request->pl_total_collection) {
                   Translation::where('slug', '=', 'pl_total_collection')->update(['value' => $request->pl_total_collection]);

               }elseif ($item->slug == 'sl_total_collection' && $item->value != $request->sl_total_collection) {
                   Translation::where('slug', '=', 'sl_total_collection')->update(['value' => $request->sl_total_collection ? $request->sl_total_collection : $request->pl_total_collection]);

               }elseif ($item->slug == 'pl_collection_this_week' && $item->value != $request->pl_collection_this_week) {
                   Translation::where('slug', '=', 'pl_collection_this_week')->update(['value' => $request->pl_collection_this_week]);

               }elseif ($item->slug == 'sl_collection_this_week' && $item->value != $request->sl_collection_this_week) {
                   Translation::where('slug', '=', 'sl_collection_this_week')->update(['value' => $request->sl_collection_this_week ? $request->sl_collection_this_week : $request->pl_collection_this_week]);

               }elseif ($item->slug == 'pl_required_field' && $item->value != $request->pl_required_field) {
                Translation::where('slug', '=', 'pl_required_field')->update(['value' => $request->pl_required_field]);

            }elseif ($item->slug == 'sl_required_field' && $item->value != $request->sl_required_field) {
                Translation::where('slug', '=', 'sl_required_field')->update(['value' => $request->sl_required_field ? $request->sl_required_field : $request->pl_required_field]);

            }

            }

             toast('Language has been successfully updated', 'success');
             return redirect()->back();
         }
         $tran = Translation();
         return view('admin.translation.profile', ['tran' => $tran,'menu'=> 'Language', 'page_title' => 'Profile']);
     }




     public function other(Request $request)
     {
        $tran = Translation();
        return view('admin.translation.other', ['tran' => $tran,'menu'=> 'Language', 'page_title' => 'Others']);

     }
}
