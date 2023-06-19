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


Route::get('/','user\UserController@index');

Auth::routes();
Route::get('/adminDashBoard', 'admin\AdminController@adminDashBoard');
Route::get('/home', 'user\UserController@index')->name('home');
//Auth::routes();
Route::get('/services', 'user\UserController@services')->name('services');

Route::get('/portfolio', 'user\UserController@portfolio')->name('portfolio');

Route::get('/about', 'user\UserController@about')->name('about');

Route::get('/contact', 'user\UserController@contact')->name('contact');

Route::get('/singlePage/{id}', 'user\UserSinglePageController@singlePageUser');
Route::post('/userContactFormSendMail','user\SendMailController@userContactFormSendMail');

/*****************************************************
*  Admin
*
*****************************************************/
Route::get('/menus','admin\AdminController@adminMenuEditor');
Route::get('/subMenu','admin\AdminController@adminSubMenuEditor');
Route::post('/addMenu','admin\AdminController@addMenu');
Route::post('/editMenu','admin\AdminController@editMenu');
Route::post('/editSubMenu','admin\AdminController@editSubMenu');
Route::post('/deleteSubMenu','admin\AdminController@deleteSubMenu');
Route::post('/addSubMenu','admin\AdminController@addSubMenu');

/*****************************************************
*  HomePage
*
*****************************************************/
Route::get('/adminHomePageEditor','admin\HomepageController@adminHomePageEditor');
Route::post('/addHomeContents','admin\HomepageController@addHomeContents');
Route::post('/addSliders','admin\HomepageController@addSliders');
Route::post('/deleteSlider','admin\HomepageController@deleteSlider');
Route::post('/photoGalleryOfHomepage','admin\HomepageController@photoGalleryOfHomepage');
Route::post('/homepagePhotoGalleryDelete','admin\HomepageController@homepagePhotoGalleryDelete');
Route::post('/addGalleryNameAndTagLineHome','admin\HomepageController@addGalleryNameAndTagLineHome');
Route::post('/addHomeContentsFactsArea','admin\HomepageController@addHomeContentsFactsArea');





/*****************************************************
*  Services
*
*****************************************************/
Route::get('/adminServicePageEditor','admin\ServicesController@adminServicePageEditor');
Route::post('/addBackGroundServices','admin\ServicesController@addBackGroundServices');
Route::post('/deleteBackgroundImage','admin\ServicesController@deleteBackgroundImage');
Route::post('/addSectionTitleAndContent','admin\ServicesController@addSectionTitleAndContent');
Route::post('/firstSectionContentsOfServices','admin\ServicesController@firstSectionContentsOfServices');
Route::post('/servicesSectionOneContentsEditView','admin\ServicesController@servicesSectionOneContentsEditView');
Route::post('/editFirstSectionContentsOfServices','admin\ServicesController@editFirstSectionContentsOfServices');
Route::post('/servicesDeletePostSectionOne','admin\ServicesController@servicesDeletePostSectionOne');

Route::post('/secondSectionContentsOfServices','admin\ServicesController@secondSectionContentsOfServices');
Route::post('/editSecondSectionContentsOfServices','admin\ServicesController@editSecondSectionContentsOfServices');
Route::post('/servicesSectionTwoContentsEditView','admin\ServicesController@servicesSectionTwoContentsEditView');
Route::post('/servicesDeletePostSectionTwo','admin\ServicesController@servicesDeletePostSectionTwo');

/*****************************************************
*  About US
*
*****************************************************/
Route::get('/adminAboutPageEditor','admin\AboutController@adminAboutPageEditor');
Route::post('/addBackGroundAbout','admin\AboutController@addBackGroundAbout');
Route::post('/deleteBackgroundImageAbout','admin\AboutController@deleteBackgroundImageAbout');
Route::post('/firstSectionContentsOfAbout','admin\AboutController@firstSectionContentsOfAbout');
Route::post('/aboutDeletePostSectionOne','admin\AboutController@aboutDeletePostSectionOne');
Route::post('/aboutSectionOneContentsEditView','admin\AboutController@aboutSectionOneContentsEditView');
Route::post('/editFirstSectionContentsOfAbout','admin\AboutController@editFirstSectionContentsOfAbout');


/*****************************************************
*  Portfolio
*
*****************************************************/
Route::get('/adminPortfolioPageEditor','admin\PortfolioController@adminPortfolioPageEditor');
Route::post('/addBackGroundPortfolio','admin\PortfolioController@addBackGroundPortfolio');
Route::post('/deleteBackgroundImagePortfolio','admin\PortfolioController@deleteBackgroundImagePortfolio');
Route::post('/addSectionTitleAndContentPortfolio','admin\PortfolioController@addSectionTitleAndContentPortfolio');
Route::post('/firstSectionContentsOfPortfolio','admin\PortfolioController@firstSectionContentsOfPortfolio');
Route::post('/portfolioSectionOneContentsEditView','admin\PortfolioController@portfolioSectionOneContentsEditView');
Route::post('/editFirstSectionContentsOfPortfolio','admin\PortfolioController@editFirstSectionContentsOfPortfolio');
Route::post('/portfolioDeletePostSectionOne','admin\PortfolioController@portfolioDeletePostSectionOne');

/*****************************************************
*  Contact
*
*****************************************************/
Route::get('/adminContactPageEditor','admin\ContactController@adminContactPageEditor');
Route::post('/addBackGroundContact','admin\ContactController@addBackGroundContact');
Route::post('/addContactInfos','admin\ContactController@addContactInfos');

/*****************************************************
*  Single Dynamic Page
*
*****************************************************/
Route::get('/adminSinglePageEditor/{id}','admin\SinglePageController@adminSinglePageEditor');
Route::post('/addBackGroundSinglePage','admin\SinglePageController@addBackGroundSinglePage');
Route::post('/deleteBackgroundImageSingle','admin\SinglePageController@deleteBackgroundImageSingle');
Route::post('/firstSectionContentsOfSinglePages','admin\SinglePageController@firstSectionContentsOfSinglePages');
Route::post('/SinglePageSectionOneContentsEditView','admin\SinglePageController@SinglePageSectionOneContentsEditView');
Route::post('/editFirstSectionContentsOfSingle','admin\SinglePageController@editFirstSectionContentsOfSingle');
Route::post('/aboutDeletePostSectionOne','admin\SinglePageController@aboutDeletePostSectionOne');


/*****************************************************
*  Password Change
*
*****************************************************/

Route::get('/adminSettingsView','admin\AdminSettingsController@adminSettingsView');
Route::post('/adminSettingsUserNameChange','admin\AdminSettingsController@adminSettingsUserNameChange');
Route::post('/adminSettingsUserPasswordChange','admin\AdminSettingsController@adminSettingsUserPasswordChange');


//custom url
// Authentication Routes...
Route::get('fortisSecurityAdminPanel', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('fortisSecurityAdminPanel', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('fortisSecurityAdminPanelRegister', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('fortisSecurityAdminPanelRegister', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
