<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `pages_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `pages_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `pages_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `pages_id` (`pages_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `pages_trans_ibfk_1` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
              CONSTRAINT `pages_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
