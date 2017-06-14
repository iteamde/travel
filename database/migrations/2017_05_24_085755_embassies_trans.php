<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmbassiesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('embassies_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `embassies_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `embassies_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `embassies_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` varchar(255) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `embassies_id` (`embassies_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `embassies_trans_ibfk_1` FOREIGN KEY (`embassies_id`) REFERENCES `embassies` (`id`) ON DELETE CASCADE,
              CONSTRAINT `embassies_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
