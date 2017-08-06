<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEmbassiesAddCitiesId extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('embassies', function(Blueprint $table) {
            $sql = 'ALTER TABLE `embassies`
            ADD `cities_id` int(11) NOT NULL AFTER `countries_id`,
            ADD FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
