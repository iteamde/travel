<?php
 /*
 * Pages Manager
 */
Route::group([
    'prefix'     => 'pages',
    'as'         => 'pages.',
], function () {

    /*
     * Pages Manager
     **/
    Route::group(['namespace' => 'Pages'], function () {
        /*
         * For DataTables
         */
        Route::post('pages/get', 'PagesTableController')->name('pages.get');

        /*
         * Pages CRUD
         */
        Route::resource('pages', 'PagesController');

          /*
         * Deleted Specific Pages
         */
        Route::group(['prefix' => 'pages/{deletedPages}'], function () {
            Route::delete('delete', 'PagesController@delete')->name('pages.delete');     
        });

        /*
         * Enable/Disable Specific Page
         */
        Route::group(['prefix' => 'pages/{pages}'], function () {
            Route::get('mark/{status}', 'PagesController@mark')->name('pages.mark')->where(['status' => '[1,2]']);
        });
    });

    /*
     * Pages Categories Manager
     **/
    Route::group(['namespace' => 'PagesCategories'], function () {
        /*
         * For DataTables
         */
        Route::post('pages_categories/get', 'PagesCategoriesTableController')->name('pages_categories.get');

        /*
         * PagesCategories CRUD
         */
        Route::resource('pages_categories', 'PagesCategoriesController');

          /*
         * Deleted Specific PageCategory
         */
        Route::group(['prefix' => 'pages_categories/{deletedPagesCategories}'], function () {
            Route::delete('delete', 'PagesCategoriesController@delete')->name('pages_categories.delete');     
        });

        /*
         * Enable/Disable Specific PageCategory
         */
        Route::group(['prefix' => 'pages_categories/{pages_categories}'], function () {
            Route::get('mark/{status}', 'PagesCategoriesController@mark')->name('pages_categories.mark')->where(['status' => '[1,2]']);
        });
    });
}); 