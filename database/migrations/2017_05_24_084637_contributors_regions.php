<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContributorsRegions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contributors_regions', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `contributors_regions`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `contributors_regions` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `users_id` int(10) unsigned NOT NULL,
              `regions_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `users_id` (`users_id`),
              KEY `regions_id` (`regions_id`),
              CONSTRAINT `contributors_regions_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
              CONSTRAINT `contributors_regions_ibfk_2` FOREIGN KEY (`regions_id`) REFERENCES `conf_religions` (`id`)
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
