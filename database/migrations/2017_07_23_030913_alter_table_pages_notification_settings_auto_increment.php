<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePagesNotificationSettingsAutoIncrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pages_notification_settings', function(Blueprint $table) {
            $sql = 'alter table `pages_notification_settings` 
                    change `id` `id` int(11) NOT NULL AUTO_INCREMENT;';
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
