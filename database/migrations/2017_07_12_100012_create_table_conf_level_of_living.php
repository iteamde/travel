<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfLevelOfLiving extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_level_of_living', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_level_of_living`;';
            DB::connection()->getPdo()->exec($sql);

            $sql = 'CREATE TABLE `conf_level_of_living` (
                    `id` int(11) NOT NULL,
                    `level` varchar(255) NOT NULL,
                    `active` int(11) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
              ALTER TABLE `conf_level_of_living`
                ADD PRIMARY KEY (`id`);';
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
