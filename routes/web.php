<?php

use Illuminate\Support\Facades\Route;
use App\Mail\forgotpasswd;
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

Route::get('/hello', function (){
    echo "<h1>Hello World!</h1>";
});

//Student side
Route::match(['get','post'],'/','home@view')->name('home.home');
Route::match(['get','post'],'/home','home@view')->name('home.home');
Route::match(['get','post'],'/homeAdmin','home@loginA')->name('home.loginA');
//Admin side
Route::match(['get','post'],'/admin','home@loginAdmin');
Route::match(['get','post'],'/admin/home','adminHome@view');
Route::match(['get','post'],'/home-admin','adminHome@home');
Route::match(['get','post'],'/home-view','adminHome@show');
Route::match(['get','post'],'/add-librarians','adminHome@addLib');
Route::match(['get','post'],'/add/librarian-final','adminHome@addLibrarian');
Route::match(['get','post'],'/edit-lib/{id}','adminHome@editLib');
Route::match(['get','post'],'/remove-lib/{id}','adminHome@removeLib');
Route::match(['get','post'],'/update-lib','adminHome@update');
Route::match(['get','post'],'/admin-logout','adminHome@logout');


Route::match(['get','post'],'/homeSignup','home@signUp')->name('home.studentSignup');
Route::match(['get','post'],'/student/totalBooksIssued','studentHome@totalBooks')->name('studentHome.studentTotalBooksIssued');
Route::match(['get','post'],'/student/currentBooksIssued','studentHome@currentBooks')->name('studentHome.studentCurrentBooksIssued');
Route::match(['get','post'],'/student/booksReserved','studentHome@reservedBooks')->name('studentHome.studentCurrentReservation');
Route::match(['get','post'],'/student/home','studentHome@view')->name('studentHome.studentLayout');
// Route::match(['get','post'],'/student/home/{id}','studentHome@views')->name('studentHome.studentLayout');
Route::match(['get','post'],'/student/browse','studentHome@browse')->name('studentHome.studentBrowse');
Route::match(['get','post'],'/student/search','studentHome@search')->name('studentHome.studentSearch');
Route::match(['get','post'],'/student/search/authors','studentHome@searchResultA')->name('studentHome.studentSearchAuthors');
Route::match(['get','post'],'/student/search/books','studentHome@searchResultB')->name('studentHome.studentSearchBooks');
Route::match(['get','post'],'/student/search/publishers','studentHome@searchResultP')->name('studentHome.studentSearchPublishers');
Route::match(['get','post'],'/student/reserve','studentHome@reserve')->name('studentHome.studentReserve');
Route::match(['get','post'],'/student/reserve/authors','studentHome@reserveA')->name('studentHome.studentReserveAuthors');
Route::match(['get','post'],'/student/reserve/books','studentHome@reserveB')->name('studentHome.studentReserveBooks');
Route::match(['get','post'],'/student/reserve/publishers','studentHome@reserveP')->name('studentHome.studentReservePublishers');
Route::match(['get','post'],'/student/settings','studentHome@settings')->name('studentHome.studentSetting');
Route::match(['get','post'],'/student/settings/changeContactDetails/{id}','studentHome@contactDetails')->name('studentHome.studentSettingChangeContactDetails');
Route::match(['get','post'],'/student/settings/changePassword/{id}','studentHome@password')->name('studentHome.studentSettingChangePassword');
Route::post('/student/update-details','studentHome@updateContactDetails');
Route::get('/student/cancel-reservation/{id}','studentHome@cancelReservation');
//Librarian side
Route::post('/issue/book-to-student','librarianHome@issueFinal');
Route::match(['get','post'],'/login-as-lib','home@loginLibrarian');
Route::match(['get','post'],'/librarian/home','librarianHome@view')->name('librarianHome.librarianHome');
Route::match(['get','post'],'/loginL','home@loginL')->name('home.loginL');
Route::match(['get','post'],'/librarian/logout','librarianHome@logout')->name('librarianHome.librarianLogout');
Route::match(['get','post'],'/librarian/connector','librarianHome@connect')->name('librarianHome.librarianMenuConnector');
Route::match(['get','post'],'/librarian/issue/books','librarianHome@issue')->name('librarianHome.librarianIssueLanding');
Route::match(['get','post'],'/librarian/issue/books/resultById','librarianHome@issueSearchResultID')->name('librarianHome.librarianIssueSearchResultsID');
Route::match(['get','post'],'/librarian/issue/books/resultByBookName','librarianHome@issueSearchResultBookName')->name('librarianHome.librarianIssueSearchResultsBookName');
Route::match(['get','post'],'/librarian/issue/books/resultByBookAuthor','librarianHome@issueSearchResultBookAuthor')->name('librarianHome.librarianIssueSearchResultsBookAuthor');
Route::match(['get','post'],'/librarian/issue/issueBook/toStudent/{id}','librarianHome@libIssueToStud')->name('librarianHome.librarianIssueToStud');
Route::match(['get','post'],'/librarian/collect','librarianHome@libCollectFromStud')->name('librarianHome.librarianCollectLanding');
Route::match(['get','post'],'/librarian/collect-book/{id}','librarianHome@collectFinal');
Route::match(['get','post'],'/librarian/collect/students/books','librarianHome@libCollectStud')->name('librarianHome.librarianCollectViewStudentsBooks');
Route::match(['get','post'],'/librarian/manageBooks','librarianHome@manageBooks')->name('librarianHome.librarianManageBooksLanding');
Route::match(['get','post'],'/librarian/manageBook/','librarianHome@manageBook')->name('librarianHome.librarianManageBooks');
// Route::match(['get','post'],'/librarian/manageBooks/view','librarianHome@viewBooks')->name('librarianHome.librarianManageBooks');
Route::match(['get','post'],'/librarian/manageBooks/addNewBook','librarianHome@getAuthors')->name('librarianHome.librarianAddNewBook');
Route::match(['get','post'],'/librarian/manageBooks/editDetails/{id}','librarianHome@editBookDetails')->name('librarianHome.librarianManageBooksEditDetails');
Route::match(['get','post'],'/librarian/manageBooks/removeBook','librarianHome@removeBook')->name('librarianHome.librarianManageBooksRemoveBook');
Route::match(['get','post'],'/librarian/manageBooks/results/bookId','librarianHome@bookIdResult')->name('librarianHome.librarianManageBookResultID');
Route::match(['get','post'],'/librarian/manageBooks/results/bookName','librarianHome@bookNameResult')->name('librarianHome.librarianManageBookResultName');
Route::match(['get','post'],'/librarian/manageBooks/results/bookAuthor','librarianHome@bookAuthorResult')->name('librarianHome.librarianManageBookResultAuthor');
Route::match(['get','post'],'/librarian/settings','librarianHome@settings')->name('librarianHome.librarianSettings');
Route::match(['get','post'],'/librarian/settings/contact-details','librarianHome@contactDetails')->name('librarianHome.librarianSettingsContactDetails');
Route::match(['get','post'],'/librarian/settings/change-password','librarianHome@changePassword')->name('librarianHome.librarianSettingsChangePassword');
Route::match(['get','post'],'/librarian/manageAuthor','librarianHome@manageAuthor')->name('librarianHome.librarianManageAuthors');
// Route::match(['get','post'],'/librarian/manageAuthors/','librarianHome@manageAuthorView')->name('librarianHome.librarianManageAuthorsView');
Route::post('/librarian/add/publisher','librarianHome@addNewPublisher');
Route::get('/librarian/add-new-publisher','librarianHome@newPublisher');
Route::post('/librarian/update/publisher','librarianHome@updatePublishers');
Route::get('/librarian/publisher/edit/{id}','librarianHome@editPublishers');
Route::get('/librarian/publisher/remove/{id}','librarianHome@removePublishers');
Route::post('/librarian/search-publishers','librarianHome@searchPublishers');
Route::post('/librarian/search-authors','librarianHome@searchAuthors');


// Route::get('/student/logout','studentHome@logout')->name('studentHome.studentLogout');
Route::post('/addingAuthors','librarianHome@addNewAuthor');
Route::post('/adding-new-book','librarianHome@addNewBook');
Route::match(['get','post'],'/librarian/manage-authors/','librarianHome@showAuthors')->name('librarianHome.librarianManageAuthorsView');

Route::match(['get','post'],'/librarian/manage-publishers/','librarianHome@managePublishers')->name('librarianHome.librarianManagePublishers');
Route::match(['get','post'],'/librarian/manage-publishers/view','librarianHome@showPublishers')->name('librarianHome.librarianManagePublishersView');
Route::post('/librarian/update/books','librarianHome@updateBooks');
Route::get('/librarian/remove/book/{id}','librarianHome@deleteBooks');
Route::get('/librarian/add-new-author','librarianHome@newAuthors');
Route::post('/librarian/add/author','librarianHome@addNewAuthors');
Route::post('/librarian/authors/update','librarianHome@updateAuthors');
Route::get('/librarian/authors/edit/{id}','librarianHome@editAuthors');
Route::get('/librarian/authors/remove/{id}','librarianHome@removeAuthors');
Route::get('/librarian/publishers/remove/{id}','librarianHome@removePublishers');
Route::post('/student/update/password','studentHome@updatePassword');
Route::match(['get','post'],'/student/{user}/reserve/book/{bookId}','studentHome@reserveBook');

//crud operations
Route::post('/studentRegistration','studentHome@store');
Route::get('/admin-get-students','studentHome@getStudents');
Route::get('/deletestudent/{id}','studentHome@destroy');
Route::get('/editstudent/{id}','studentHome@edit');
Route::post('/updateStudent','studentHome@update');
Route::post('/student-login','studentHome@login');
Route::get('/student/logout','studentHome@logout');
Route::get('/approve-students','librarianHome@approve');
Route::get('/forgot-password','studentHome@forgotPassword');
Route::get('/approve/{id}','librarianHome@approved');
Route::get('/reject/{id}','librarianHome@reject');
Route::get('/librarian/reports','librarianHome@reportView');
Route::get('/transactions','librarianHome@transactions');
Route::get('/books-currently-issued','librarianHome@current');