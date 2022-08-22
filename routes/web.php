<?php

use App\Http\Controllers\Front\WithdrawCOntroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require base_path('routes/link/superadmin.php');
require base_path('routes/link/admin.php');
require base_path('routes/link/campaigner.php');



Route::get('set-lang/{lang}', 'SetLanguageController@setLanguage')->name('set_lang');

Route::group(['namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    #campaign
    Route::get('campaign-details/{slug?}', 'HomeController@campDetails')->name('campaign.details');
    Route::post('campaign-comment', 'HomeController@campaignComment')->name('campaign.comment.store');

    Route::get('about-us', 'HomeController@aboutUs')->name('about.us');
    Route::get('team', 'HomeController@team')->name('team');

    #bog
    Route::get('blog', 'HomeController@blog')->name('blog');
    Route::get('blog-details/{slug?}', 'HomeController@blogDetails')->name('blog.details');
    Route::get('tag-blog/{slug?}', 'HomeController@tagBlog')->name('tag.blog');
    Route::get('category-blog/{slug?}', 'HomeController@categoryBlog')->name('categoy.blog');
    Route::get('search-blog', 'HomeController@searchBlog')->name('search.blog');
    Route::post('blog-comment', 'HomeController@blogComment')->name('blog.comment.store');



    Route::get('sign-up', 'AuthController@signUp')->name('sign.up');
    Route::post('sign-up-store', 'AuthController@signUp')->name('sign.up.store');

    Route::get('become/{donar?}', 'AuthController@signUp')->name('become.doner');
    Route::post('become-doner', 'AuthController@signUp')->name('become.doner.store');

    Route::get('sign-in', 'AuthController@signIn')->name('sign.in');
    Route::post('sign-in-check', 'AuthController@signIn')->name('sign.in.check');


    # forget password

    Route::get('forget-password','AuthController@resetPassword')->name('forget.password');
    Route::post('forget-password-check','AuthController@resetPassword')->name('forget.password.check');

    Route::get('/password/reset/{token}','AuthController@passwordResetView')->name('password.resetlink');
    Route::post('/password/update','AuthController@updatePassword')->name('update.password');

    Route::get('contact-us', 'CustomerRelationshipManagementController@contactUs')->name('contact.us');
    Route::post('contact-us', 'CustomerRelationshipManagementController@contactUs')->name('contact.us.store');

    Route::post('subscribe-store', 'CustomerRelationshipManagementController@newsletter')->name('newsletter.store');

    # Auth user route
    Route::group(['middleware'=> 'auth.user'], function () {

        Route::get('my-dashboard', 'UserProfileController@dashboard')->name('user.dashboard');
        Route::get('my-profile', 'UserProfileController@profile')->name('user.profile');
        Route::get('user-logout', 'UserProfileController@logout')->name('user.logout');

        Route::get('my-account-deactivate', 'UserProfileController@deactiveAccount')->name('user.account.deactivate');

        Route::get('my-profile-edit', 'UserProfileController@editUpdateProfile')->name('user.profile.edit');
        Route::post('my-profile-update', 'UserProfileController@editUpdateProfile')->name('user.profile.update');

        Route::get('my-password-change', 'UserProfileController@passwordChange')->name('user.password.change');
        Route::post('my-password-change-update', 'UserProfileController@passwordChange')->name('user.password.update');

        Route::get('my-campaign', 'CampaignController@index')->name('user.campaigns');
        Route::get('create-my-campaign', 'CampaignController@createStore')->name('user.campaing.create');
        Route::post('create-my-campaign-store', 'CampaignController@createStore')->name('user.campaing.store');

        Route::get('my-pending-campaign', 'CampaignController@pending')->name('user.campaign.pending');
        Route::get('my-running-campaign', 'CampaignController@running')->name('user.campaign.running');
        Route::get('my-backed-campaign', 'CampaignController@backed')->name('user.campaign.backed');

        Route::get('my-campaign-edit/{slug?}', 'CampaignController@editUpdate')->name('user.campaign.edit');
        Route::post('my-campaign-update', 'CampaignController@editUpdate')->name('user.campaign.update');

        Route::get('my-campaign-view/{slug?}', 'CampaignController@view')->name('user.campaign.view');

        # withdraw
        Route::get('withdraw', 'WithdrawCOntroller@index')->name('user.withdraw');
        Route::get('withdraw-details/{id?}', 'WithdrawCOntroller@details')->name('user.withdraw.details');

        Route::post('withdraw', 'WithdrawCOntroller@withdraw')->name('user.withdraw.post');
        Route::get('paypal-withdraw', 'WithdrawCOntroller@paypal')->name('user.paypal.withdraw');
        Route::post('paypal-withdraw', 'WithdrawCOntroller@paypal')->name('user.paypal.withdraw.store');
        Route::get('stripe-withdraw', 'WithdrawCOntroller@stripe')->name('user.stripe.withdraw');
        Route::post('stripe-withdraw', 'WithdrawCOntroller@stripe')->name('user.stripe.withdraw.store');


    });

    Route::get('donate/{campaign?}', 'DonateController@donate')->name('donate');
    Route::post('donate-post', 'DonateController@donate')->name('donate.post');
    Route::get('donate-payment', 'DonateController@payment')->name('donate.payment');

    Route::get('stripe-donate', 'StripeController@payment')->name('stripe.payment');
    Route::post('stripe-donate-store', 'StripeController@payment')->name('stripe.payment.store');



});


    Route::post('/payments/pay', 'PaymentController@pay')->name('pay');
    Route::get('/payments/approval', 'PaymentController@approval')->name('approval');
    Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled');

