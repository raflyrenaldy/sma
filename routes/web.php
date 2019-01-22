<?php



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ppdb', 'ppdbController@index')->name('user.daftaronline');
Route::get('/berita','HomeController@berita');
Route::get('/about','HomeController@about');
Route::get('/profil','HomeController@profil');
Route::get('search', 'HomeController@search');
Route::get('/hasil','HomeController@hasil');
Route::get('datahasil','HomeController@datahasil');
Route::get('/programkesiswaan','HomeController@program');
Route::get('/berita/read/{title}','HomeController@display');
Route::get('/berita/arsip/{month}','HomeController@arsip');

Route::get('/profile','studentController@index')->name('user.profile');
Route::patch('/profile/{id}','studentController@update')->name('user.updateprofile');
Route::post('/profile/unggah','studentController@reupload')->name('user.reupload');

Route::get('/indonesia','CountryController@provinces');
Route::get('/json-regencies','CountryController@regencies');
Route::get('/json-districts', 'CountryController@districts');
Route::get('/json-village', 'CountryController@villages');
Route::post('/ppdb/add','ppdbController@store');

Route::prefix('adminpage')->group(function() {
    Route::get('/login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::get('/','adminController@index')->name('admin.home');
    Route::get('/ppdb/datalengkap','adminppdbController@index');
    Route::get('/ppdb/dataumum','adminppdbController@indexumum')->name('admin.dataumumppdb');
    Route::post('/ppdb/dataumum/datafilter','adminppdbController@filter')->name('admin.filterdataumum');
    Route::get('/ppdb/datasiswa','adminppdbController@diterima')->name('admin.datasiswaditerima');
    Route::get('/ppdb/datasiswa/{q}','adminppdbController@diterimathn')->name('datasiswa.diterima');
    Route::get('/ppdb/datasiswaditolak','adminppdbController@ditolak')->name('admin.datasiswaditolak');
    Route::get('/news','newsController@index')->name('admin.berita');
    Route::post('/news/addnews','newsController@store');
    Route::get('/addnews','newsController@addnews');
    Route::get('/news/update','newsController@updatenews');
    Route::get('/kepsek','kepsekController@index');
    Route::post('/kepsek/addkepsek','kepsekController@store');
    Route::patch('/ppdb/editregistrasi/{id}',['as' => 'registrasi.update', 'uses' => 'adminppdbController@editregistrasi']);
    Route::patch('/ppdb/editbiodata/{id}',['as' => 'biodata.update', 'uses' => 'adminppdbController@editbiodata']);
    Route::patch('/ppdb/editfather/{id}',['as' => 'father.update', 'uses' => 'adminppdbController@editfather']);
    Route::patch('/ppdb/editmother/{id}',['as' => 'mother.update', 'uses' => 'adminppdbController@editmother']);
    Route::patch('/ppdb/editwali/{id}',['as' => 'wali.update', 'uses' => 'adminppdbController@editwali']);
    Route::patch('/ppdb/updatesiswa/{id}',['as' => 'siswa.update', 'uses' => 'adminppdbController@update']);
    Route::patch('/news/update/{id}',['as' => 'news.update', 'uses' => 'newsController@edit']);
    Route::patch('/kepsek/{id}',['as' => 'kepsek.update', 'uses' => 'kepsekController@update']);
    Route::delete('/ppdb/hapusdata/{id}', 'adminppdbController@deleteRegistrasi')->name('deleteRegistrasi');
    Route::delete('/kepsek/{id}', 'kepsekController@destroy')->name('deleteKepsek');
    Route::delete('/news/delete/{id}', 'newsController@destroy')->name('deleteNews');
    
    Route::post('/ppdb/datalengkap/akta/{id}','adminppdbController@deleteAkta')->name('admin.delete.akta');
    Route::post('/ppdb/datalengkap/ijazah/{id}','adminppdbController@deleteIjazah')->name('admin.delete.ijazah');
    Route::post('/ppdb/datalengkap/skhun/{id}','adminppdbController@deleteSkhun')->name('admin.delete.skhun');
    Route::post('/ppdb/datalengkap/kk/{id}','adminppdbController@deleteKK')->name('admin.delete.kk');
    Route::post('/ppdb/datalengkap/ktp/{id}','adminppdbController@deleteKtp')->name('admin.delete.ktp');
    Route::post('/ppdb/datalengkap/skb/{id}','adminppdbController@deleteSkb')->name('admin.delete.skb');
});
Route::prefix('student')->group(function() {
Route::get('/login', 'AuthStudent\LoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'AuthStudent\LoginController@login')->name('student.login.submit');
    Route::get('/logout', 'AuthStudent\LoginController@logout')->name('student.logout');
    Route::get('/register', 'AuthStudent\RegisterController@showRegistrationForm')->name('student.register');
    Route::post('/register','AuthStudent\RegisterController@Register')->name('student.register.submit');
    Route::get('/password/reset', 'AuthStudent\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('/password/email', 'AuthStudent\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('/password/reset/{token}', 'AuthStudent\ResetPasswordController@showResetForm')->name('student.password.reset');
    Route::post('/password/reset', 'AuthStudent\ResetPasswordController@reset');
});