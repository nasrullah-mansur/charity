<?php

use Illuminate\Support\Facades\Route;

route::get('admin/', 'Auth\AuthController@adminlogin')->name('admin.login');
route::post('admin/', 'Auth\AuthController@adminlogin')->name('admin.login.attempt');


# forget password

Route::get('admin-forget-password','AuthController@AdminResetPassword')->name('admin.forget.password');
Route::post('admin-forget-password-check','AuthController@AdminResetPassword')->name('admin.forget.password.check');

Route::get('admin-password/reset/{token}','AuthController@AdminPasswordResetView')->name('admin.password.resetlink');
Route::post('admin-password/update','AuthController@AdminUpdatePassword')->name('admin.update.password');

# withdraw

Route::post('paypal-withdraw-success', 'PaymentController@withdraw')->name('admin.paypal.withdraw');
Route::post('stripe-withdraw-success', 'Front\StripeController@transfer')->name('admin.stripe.withdraw');



Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {


    //    ****************** Dashboard ***************

    Route::get('dashboard', 'DashboardController@home')->name('admin.dashboard');

    //    ****************** Transaction  ***************
    Route::get('donatios', 'TransactionController@donation')->name('admin.donations');
    Route::get('withdraw', 'TransactionController@withdraw')->name('admin.withdraw');

    Route::get('withdraw-show/{id?}', 'TransactionController@show')->name('admin.withdraw.show');



    //    ****************** Translation ***************
    Route::group(['prefix' => 'translation'], function () {


        Route::get('home-page', 'TranslationController@home')->name('admin.translation.home');
        Route::post('home-update', 'TranslationController@home')->name('admin.translation.home.update');

        Route::get('about-us-page', 'TranslationController@about')->name('admin.translation.about');
        Route::post('about-us-page-update', 'TranslationController@about')->name('admin.translation.about.update');

        Route::get('blog-us-page', 'TranslationController@blog')->name('admin.translation.blog');
        Route::post('blog-us-page-update', 'TranslationController@blog')->name('admin.translation.blog.update');

        Route::get('signin-signup-page', 'TranslationController@signinSignup')->name('admin.translation.signin_signup');
        Route::post('signin-signup-update', 'TranslationController@signinSignup')->name('admin.translation.signin_signup.update');

        Route::get('user-profile-page', 'TranslationController@profile')->name('admin.translation.profile');
        Route::post('user-profile-update', 'TranslationController@profile')->name('admin.translation.profile.update');

        Route::get('others', 'TranslationController@other')->name('admin.translation.others');
        Route::post('others-update', 'TranslationController@other')->name('admin.translation.others.update');

    });
    //    ******************Category***************

    Route::group(['prefix' => 'category'], function () {

        Route::get('', 'CategoryController@index')->name('admin.category');

        Route::get('create', 'CategoryController@createStore')->name('admin.category.create');
        Route::post('store', 'CategoryController@createStore')->name('admin.category.store');

        Route::get('edit/{slug}', 'CategoryController@editUpdate')->name('admin.category.edit');
        Route::post('update', 'CategoryController@editUpdate')->name('admin.category.update');

        Route::get('delete/{slug}', 'CategoryController@delete')->name('admin.category.delete');

        Route::get('status/{edit}/{status}', 'CategoryController@changeStatus')->name('admin.categoryChangeStatus');

    });

     //    ****************** Tag ***************

     Route::group(['prefix' => 'tag'], function () {

        Route::get('', 'TagController@index')->name('admin.tag');

        Route::get('create', 'TagController@createStore')->name('admin.tag.create');
        Route::post('store', 'TagController@createStore')->name('admin.tag.store');

        Route::get('edit/{slug}', 'TagController@editUpdate')->name('admin.tag.edit');
        Route::post('update', 'TagController@editUpdate')->name('admin.tag.update');

        Route::get('delete/{slug}', 'TagController@delete')->name('admin.tag.delete');

        Route::get('status/{edit}/{status}', 'TagController@changeStatus')->name('admin.tag.status');

    });

    //    ******************  Slider ***************

    Route::group(['prefix' => 'slider'], function () {

        Route::get('', 'SliderController@index')->name('admin.slider');

        Route::get('crate', 'SliderController@createStore')->name('admin.slider.create');
        Route::post('store', 'SliderController@createStore')->name('admin.slider.store');

        Route::get('edit/{id}', 'SliderController@editUpdate')->name('admin.slider.edit');
        Route::post('update', 'SliderController@editUpdate')->name('admin.slider.update');

        Route::get('delete/{id}', 'SliderController@delete')->name('admin.slider.delete');

        Route::get('status/{id}/{status}', 'SliderController@changeStatus')->name('admin.sliderChangeStatus');

    });

    # Charity Feature
    Route::group(['prefix' => 'charity-features'], function () {

        Route::get('', 'CharityController@index')->name('admin.charity');
        Route::post('update', 'CharityController@index')->name('admin.charity.update');

        Route::get('status/{id}/{status}', 'CharityController@changeStatus')->name('admin.charity.status');

    });

     # talent team
     Route::group(['prefix' => 'team'], function () {

        Route::get('', 'TeamMemberController@index')->name('admin.talent.team');

        Route::get('create', 'TeamMemberController@createStore')->name('admin.talent.team.create');
        Route::post('store', 'TeamMemberController@createStore')->name('admin.talent.team.store');

        Route::get('edit/{id}', 'TeamMemberController@editUpdate')->name('admin.talent.team.edit');
        Route::post('update', 'TeamMemberController@editUpdate')->name('admin.talent.team.update');

        Route::get('delete/{id}', 'TeamMemberController@delete')->name('admin.talent.team.delete');

        Route::get('status/{slug}/{status}', 'TeamMemberController@changeStatus')->name('admin.talent.team.status');

    });


    # Donar feedback
    Route::group(['prefix' => 'donar-feedbacks'], function () {

        Route::get('', 'DonarFeedbackController@index')->name('admin.donar.feedback');

        Route::get('create', 'DonarFeedbackController@createStore')->name('admin.donar.feedback.create');
        Route::post('store', 'DonarFeedbackController@createStore')->name('admin.donar.feedback.store');

        Route::get('edit/{id}', 'DonarFeedbackController@editUpdate')->name('admin.donar.feedback.edit');
        Route::post('update', 'DonarFeedbackController@editUpdate')->name('admin.donar.feedback.update');

        Route::get('delete/{id}', 'DonarFeedbackController@delete')->name('admin.donar.feedback.delete');

        Route::get('status/{id}/{status}', 'DonarFeedbackController@changeStatus')->name('admin.donar.feedback.status');

    });

        #Help Area
        Route::get('help-area', 'PagesController@helpArea')->name('admin.page.help.area');
        Route::post('help-area-update', 'PagesController@helpArea')->name('admin.page.help.area.update');

        # Trusted Partner
    Route::group(['prefix' => 'partner'], function () {

        Route::get('', 'PartnerController@index')->name('admin.partner');

        Route::get('create', 'PartnerController@createStore')->name('admin.partner.create');
        Route::post('store', 'PartnerController@createStore')->name('admin.partner.store');

        Route::get('edit/{id}', 'PartnerController@editUpdate')->name('admin.partner.edit');
        Route::post('update', 'PartnerController@editUpdate')->name('admin.partner.update');

        Route::get('delete/{id}', 'PartnerController@delete')->name('admin.partner.delete');

        Route::get('status/{id}/{status}', 'PartnerController@changeStatus')->name('admin.partner.status');

    });


    //    ******************  Blog ***************

    Route::group(['prefix' => 'news'], function () {

        Route::get('', 'BlogController@index')->name('admin.blog');

        Route::get('create',  'BlogController@createStore')->name('admin.blog.create');
        Route::post('store', 'BlogController@createStore')->name('admin.blog.store');

        Route::get('edit/{slug}', 'BlogController@editUpdate')->name('admin.blog.edit');
        Route::post('update', 'BlogController@editUpdate')->name('admin.blog.update');

        Route::get('delete/{id}','BlogController@delete')->name('admin.blog.delete');

        Route::get('status/{id}/{status}',  'BlogController@changeStatus')->name('admin.blogChangeStatus');

    });
    //********************** General Settings ***********************

    Route::group(['prefix' => 'settings'], function () {

        Route::get('general', 'AdminSettingsController@generalSettings')->name('admin.general.settings');
        Route::post('general-update', 'AdminSettingsController@generalSettings')->name('admin.general.settings.update');

          # seo link

          Route::get('seo', 'AdminSettingsController@seoSettings')->name('admin.seo.settings');
          Route::post('seo-update', 'AdminSettingsController@seoSettings')->name('admin.seo.settings.update');

        # social link

        Route::get('social-link', 'AdminSettingsController@socialLink')->name('admin.social.link.settings');
        Route::post('social-link-update', 'AdminSettingsController@socialLink')->name('admin.social.link.settings.update');

         #contact us
         Route::get('contact-us', 'ContactUsSettingsController@contactUs')->name('admin.contact.us.settings');
         Route::post('contact-us', 'ContactUsSettingsController@contactUs')->name('admin.contact.us.settings.store');

         # donations settings
         Route::get('donations', 'AdminSettingsController@donations')->name('admin.donation.settings');
         Route::post('donations-update', 'AdminSettingsController@donations')->name('admin.donation.settings.update');

    });

    //********************** Pages ***********************

    Route::group(['prefix' => 'page'], function () {


        #about us
        Route::get('about-us', 'PagesController@aboutUs')->name('admin.page.about_us');
        Route::post('about-us-update', 'PagesController@aboutUs')->name('admin.page.about_us.update');

        #our journey
        Route::get('our-journey', 'PagesController@ourJourney')->name('admin.page.our.journey');
        Route::post('our-journey-update', 'PagesController@ourJourney')->name('admin.page.our.journey.update');

        Route::get('home', 'PagesController@home')->name('admin.page.home');
        Route::post('home-update', 'PagesController@home')->name('admin.page.home.update');

        #Terms and condition
        Route::get('terms-and-conditions', 'PagesController@termAndConditions')->name('admin.page.term.and.condition');
        Route::post('terms-and-conditions-update', 'PagesController@termAndConditions')->name('admin.page.term.and.condition.update');

        #404
        Route::get('404', 'PagesController@error404')->name('admin.page.404');
        Route::post('404-update', 'PagesController@error404')->name('admin.page.404.update');

    });

    # campaign
    Route::get('under-approval-campaign', 'CampaignController@approval')->name('admin.campaign.approval');
    Route::get('running-campaign', 'CampaignController@running')->name('admin.campaign.running');
    Route::get('completed-campaign', 'CampaignController@completed')->name('admin.campaign.completed');

    Route::get('campaign-show/{slug?}', 'CampaignController@show')->name('admin.campaign.show');
    Route::post('approved', 'CampaignController@approved')->name('admin.campaign.approved');



//****************** Profile ********************

    Route::group(['prefix' => 'profile'], function () {

        Route::get('', 'ProfileController@profile')->name('admin.profile');
        Route::post('update', 'ProfileController@updateProfile')->name('admin.profile.update');
        Route::post('password/update', 'ProfileController@updatePassword')->name('admin.password.update');
        Route::get('logout', 'ProfileController@logout')->name('admin.logout');


    });




    //    ******************** Orders ***********************


    Route::group(['prefix' => 'orders'], function () {

        Route::get('{key?}', ['as' => '', 'uses' => 'ManageOrderController@index'])->name('admin.orders');

        #trash
        Route::get('all/trash', ['as' => '', 'uses' => 'ManageOrderController@trash'])->name('admin.all.deleted.order');
        Route::get('all/request-products', ['as' => '', 'uses' => 'ManageOrderController@userDemandProducts'])->name('admin.user.demand.products');


        Route::get('fore-delete/{id}', ['as' => '', 'uses' => 'ManageOrderController@forceDelete'])->name('admin.order.force.delete');
        Route::get('restore/{id}', ['as' => '', 'uses' => 'ManageOrderController@restore'])->name('admin.order.restore');
        #

        Route::get('all/products', ['as' => '', 'uses' => 'ManageOrderController@allOrderProducts'])->name('admin.all.order.products');

        Route::get('invoice/{id}', 'ManageOrderController@invoice')->name('admin.order.invoice');
        Route::get('details/{id}', 'ManageOrderController@details')->name('admin.order.details');
        Route::get('delete/{id}', 'ManageOrderController@delete')->name('admin.order.delete');

        Route::post('product/status/update', 'ManageOrderController@productOrderStatusUpdate')->name('admin.order.product.status.update');


        Route::post('order/status/update', 'ManageOrderController@orderStatusUpdate')->name('admin.order.status.update');

        Route::post('order/delivery-failed', 'ManageOrderController@deliveryFailed')->name('admin.order.delivery.failed');

        Route::get('transactions', 'ManageOrderController@transactions')->name('transactions');


        Route::get('/report/order', 'ReportController@orderReport')->name('admin.report.order');
        Route::post('/report/order', 'ReportController@orderReport')->name('admin.report.order.store');


    });

    //    ******************** Users ***********************


    Route::group(['prefix' => 'users'], function () {

        Route::get('', 'UserController@index')->name('admin.all.users');
        Route::get('/orders/{id}', 'UserController@userOrders')->name('admin.user.orders');
        Route::get('/orders-invoice/{id}', 'UserController@userOrdersInvoice')->name('admin.user.orders.invoice');

        Route::post('', 'UserController@sendSms')->name('admin.sendSms');

        Route::get('subscriber', 'UserController@subscriber')->name('admin.subscribers');


    });

    # Contact
    Route::group(['prefix' => 'contact'], function () {

        Route::get('', 'ContactController@index')->name('admin.contacts');
        Route::get('delete/{id}', 'ContactController@delete')->name('admin.contact.delete');
        Route::get('/reply/{id}', 'ContactController@reply')->name('admin.contact.reply');
        Route::post('/send-reply', 'ContactController@sendReply')->name('admin.contact.sendReply');

    });


    //    ************************ FAQ *********************

    Route::group(['prefix' => 'faq'], function () {

        Route::group(['prefix'=>'header'], function(){

        Route::get('', 'FaqController@HeaderIndex')->name('admin.faq.header');

        Route::get('create', 'FaqController@HeaderCreateStore')->name('admin.faq.header.create');
        Route::post('store', 'FaqController@HeaderCreateStore')->name('admin.faq.header.store');

        Route::get('edit/{id}', 'FaqController@HeaderEditUpdate')->name('admin.faq.header.edit');
        Route::post('update', 'FaqController@HeaderEditUpdate')->name('admin.faq.header.update');

        });

        Route::get('', 'FaqController@index')->name('admin.faq');

        Route::get('create', 'FaqController@createStore')->name('admin.faq.create');
        Route::post('store', 'FaqController@createStore')->name('admin.faq.store');

        Route::get('edit/{id}', 'FaqController@editUpdate')->name('admin.faq.edit');
        Route::post('update', 'FaqController@editUpdate')->name('admin.faq.update');
        Route::get('delete/{id}', 'FaqController@delete')->name('admin.faq.delete');

        Route::get('status/{id}/{status}', 'FaqController@statusChange')->name('admin.faq.status.change');


    });


});


