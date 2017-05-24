<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfReligionsTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_religions_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_religions_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_religions_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `religions_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `religions_id` (`religions_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_religions_trans_ibfk_1` FOREIGN KEY (`religions_id`) REFERENCES `conf_religions` (`id`),
              CONSTRAINT `conf_religions_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`)
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
