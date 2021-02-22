<?php

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


Route::get('/', 'LoginController@index');
Route::post('admin/login-post', 'LoginController@create');

Route::group(['prefix'=>'admin','middleware' => ['admin']],function() {
   
    Route::get('dashboard', 'AdminController@index');
    Route::get('change-password', 'AdminController@change_password');
    Route::post('change-password-post','AdminController@change_password_post');

    Route::get('logout', 'AdminController@logout');

    Route::get('profile-setting', 'AdminController@show');
    Route::post('profile-post','AdminController@store');



    // client 
    Route::get('client', 'ClientController@index');

    Route::get('create-client', 'ClientController@create');
    Route::post('store-client','ClientController@store');

    Route::get('edit-client/{id}', 'ClientController@edit');
    Route::post('update-client','ClientController@update');

    Route::get('details-client/{id}','ClientController@show');
    Route::get('delete-client/{id}','ClientController@destroy');

    Route::post('approve-client','ClientController@approve_agent');

  

    //category 
    Route::get('category','CategoryController@index');
    Route::get('create-category','CategoryController@create');
    Route::post('store-category','CategoryController@store');
    Route::get('edit-category/{id}','CategoryController@edit');
    Route::post('update-category','CategoryController@update');
    
    Route::post('status-category','CategoryController@status');
    Route::get('delete-category/{id}','CategoryController@destroy');




    //size 
    Route::get('size','SizeController@index');
    Route::get('create-size','SizeController@create');
    Route::post('store-size','SizeController@store');
    Route::get('edit-size/{id}','SizeController@edit');
    Route::post('update-size','SizeController@update');
    
    Route::post('status-size','SizeController@status');
    Route::get('delete-size/{id}','SizeController@destroy');
    
    
    
      //banner 
    Route::get('banner','SettingController@banner_show');
    Route::get('create-banner','SettingController@create_banner');
    Route::post('store-banner','SettingController@store_banner');
    Route::get('edit-banner/{id}','SettingController@banner_edit');
    Route::post('update-banner','SettingController@banner_update');
    
    Route::post('status-size','SettingController@status');
    Route::get('delete-banner/{id}','SettingController@delete_banner');




    //product 
    Route::get('product-list','ProductController@index');
    Route::get('create-product','ProductController@create');
    Route::post('store-product','ProductController@store');
    Route::get('edit-product/{id}','ProductController@edit');
    Route::post('update-product','ProductController@update');
    
    Route::post('status-product','ProductController@status');
    Route::get('delete-product/{id}','ProductController@destroy');





    //order 
    Route::get('order','OrderController@index');
    Route::get('order-details/{id}','OrderController@show');
    // Route::post('store-product','OrderController@store');
    // Route::get('edit-product/{id}','OrderController@edit');
    // Route::post('update-product','OrderController@update');
    
     Route::post('change-order-status','OrderController@store');
    // Route::get('delete-product/{id}','OrderController@destroy');




      //subcategory 
    Route::get('subcategory','SubcategoryController@index');
    Route::get('create-subcategory','SubcategoryController@create');
    Route::post('store-subcategory','SubcategoryController@store');
    Route::get('edit-subcategory/{id}','SubcategoryController@edit');
    Route::post('update-subcategory','SubcategoryController@update');
    
    Route::post('status-subcategory','SubcategoryController@status');
    Route::get('delete-subcategory/{id}','SubcategoryController@destroy');




 
      //plans 
    Route::get('pack','PackController@index');
    Route::get('create-pack','PackController@create');
    Route::post('store-pack','PackController@store');
    Route::get('edit-pack/{id}','PackController@edit');
    Route::post('update-pack','PackController@update');
    
    Route::post('status-pack','PackController@status');
    Route::get('delete-pack/{id}','PackController@destroy');



    //setting
    Route::get('social','SettingController@index');
    Route::post('social-post','SettingController@create');

    //mail setting
    Route::get('mail-setting','SettingController@mail');
    Route::post('mail-post','SettingController@mail_create');

    //website setting
    Route::get('website-setting','SettingController@show');
    Route::post('website-post','SettingController@create');

    


      //subadmins create 
    Route::get('subadmins','AdminController@subadmins');
    Route::get('create-subadmin','AdminController@create_subadmins');
    Route::post('store-subadmin','AdminController@store_subadmins');
    Route::get('edit-subadmin/{subadmin_id}','AdminController@edit_subadmins');
    Route::post('update-subadmin','AdminController@update_subadmins');
    
    // Route::post('status-category','AdminController@status_subadmins');
    Route::get('delete-subadmin/{subadmin_id}','AdminController@delete_subadmins');
   

   //investor send verification email
    Route::get('send-verification/{user_id}','AdminController@send_verification');


   //investor verification manually
    Route::get('manually-verification/{user_id}','AdminController@manually_verification');


    //wallet 
    Route::post('action-wallet','AdminController@action_wallet');

    Route::get('edit-wallet/{id}','AdminController@edit_wallet');

    Route::post('edit-wallet-post','AdminController@edit_wallet_post');


    Route::get('transactions','AdminController@transactions');
    
    Route::post('get-notification','AdminController@get_notification');

    Route::get('show-all-notification','AdminController@show_all_notification');

    Route::get('show-details-by-notification/{notification_id}','AdminController@show_details_by_notification');





  
});
