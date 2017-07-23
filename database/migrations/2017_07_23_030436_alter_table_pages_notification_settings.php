<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePagesNotificationSettings extends Migration
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
            $sql = 'ALTER TABLE `pages_notification_settings`
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
