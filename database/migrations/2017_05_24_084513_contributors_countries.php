<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContributorsCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contributors_countries', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `contributors_countries`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `contributors_countries` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `users_id` int(10) unsigned NOT NULL,
              `countries_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `users_id` (`users_id`),
              KEY `countries_id` (`countries_id`),
              CONSTRAINT `contributors_countries_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
              CONSTRAINT `contributors_countries_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
