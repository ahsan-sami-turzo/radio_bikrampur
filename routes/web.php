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

Route::get('/ezyvehicle', function () {
	return Redirect::to('https://ezyvehicle.ezyfintech.com');
});

Route::get('/','user\UserController@index');

Auth::routes();
Route::get('/adminDashBoard', 'admin\AdminController@adminDashBoard');
Route::get('/home', 'user\UserController@index')->name('home');
//Auth::routes();
Route::get('/services', 'user\UserController@services')->name('services');

Route::get('/insightResources', 'user\UserController@portfolio')->name('Insight Resources');

Route::get('/media', 'user\UserController@media')->name('media');



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
Route::post('/deleteMenu','admin\AdminController@deleteMenu');

Route::post('/editMenu','admin\AdminController@editMenu');
Route::post('/editSubMenu','admin\AdminController@editSubMenu');
Route::post('/deleteSubMenu','admin\AdminController@deleteSubMenu');
Route::post('/addSubMenu','admin\AdminController@addSubMenu');

/*****************************************************
*  HomePage
*
*****************************************************/
Route::get('/adminHomePageEditor','admin\HomepageController@adminHomePageEditor');

Route::get('/adminMediaPageEditor', 'admin\MediapageController@adminHomePageEditor');
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
Route::get('registeration', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('fortisSecurityAdminPanelRegister', 'Auth\RegisterController@register');

Route::post('registerUser', 'user\UserController@registerUser');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


/*****************************************************
* common edit
*
*****************************************************/

// Route::get('/commonPageEditor', 'admin\CommonController@adminAboutPageEditor');
// Route::get('/commonPageEditorAdd', 'admin\CommonController@firstSectionContentsOfAbout');
// Route::post('/commonPageEditorAdd', 'admin\CommonController@firstSectionContentsOfAbout');



// Route::get('/adminCommonPageEditor','admin\AboutCommonController@adminAboutPageEditor');

Route::get('/adminCommonPageEditor/{id}','admin\AboutCommonController@adminAboutPageEditor');

// Route::post('/adminCommonPageEditor/{id}','admin\AboutCommonController@index');

// Route::get('/inputDataIntoDb', 'admin\AboutCommonController@inputDataIntoDb');

// Route::post('/inputDataIntoDb','admin\AboutCommonController@inputData');

Route::post('/inputDataIntoDb','admin\AboutCommonController@inputData')->name('common.add');

Route::post('/deleteDataFromDb', 'admin\AboutCommonController@aboutDeletePostSectionOne');

Route::post('/aboutSectionOneEdit', 'admin\AboutCommonController@editFirstSectionContentsOfAbout');

Route::post('/addBackGround','admin\AboutCommonController@addBackGround');
Route::post('/deleteBackGround','admin\AboutCommonController@deleteBackGround');






/*****************************************************
*  Service Module Children Route

	Children :
				On Going Services
				Up Coming Services
*
*****************************************************/


Route::get('/onGoingServices', 'admin\onGoingServices@index');

Route::get('/upcomingservices', 'admin\upComingServices@index');

Route::get('/boardOfDirectors', 'admin\boardOfDirectors@index');








/*****************************************************
*
* Online Radio & Video
*
*****************************************************/

Route::get('/radio', 'media\RadioController@index')->name('radio');


// WhoWeAre
Route::get('/admin/createWhoWeAre', 'user\UserController@createWhoWeAre');
Route::get('/admin/deleteWhoWeAre/{id}', 'user\UserController@deleteWhoWeAre');
Route::post('/admin/saveWhoWeAre', 'user\UserController@saveWhoWeAre');

// Programs
Route::get('/admin/createProgram', 'user\UserController@createProgram');
Route::get('/admin/deleteProgram/{id}', 'user\UserController@deleteProgram');
Route::post('/admin/saveProgram', 'user\UserController@saveProgram');

// Schedule
Route::get('/admin/createSchedule', 'user\UserController@createSchedule');
Route::get('/admin/deleteSchedule/{id}', 'user\UserController@deleteSchedule');
Route::post('/admin/saveSchedule', 'user\UserController@saveProgramSchedule');

// Team
Route::get('/admin/createRJ', 'user\UserController@createRJ');
Route::get('/admin/deleteRJ/{id}', 'user\UserController@deleteRJ');
Route::post('/admin/saveRJ', 'user\UserController@saveRJ');
Route::post('/admin/editRJDetails', 'user\UserController@editRJDetails');
// Route::post('/admin/saveEditMemberDetails', 'user\UserController@saveEditMemberDetails');


// Youtube Video 
Route::get('/admin/createVideo', 'user\UserController@createVideo');
Route::get('/admin/deleteVideo/{id}', 'user\UserController@deleteVideo');
Route::post('/admin/saveVideo', 'user\UserController@saveVideo');


Route::post('/getPhotoInfo', 'user\UserController@getPhotoInfo');
Route::post('/getNewsDetails', 'user\UserController@getNewsDetails');