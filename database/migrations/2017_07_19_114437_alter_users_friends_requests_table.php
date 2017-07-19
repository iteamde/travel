<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersFriendsRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users_friend_requests', function(Blueprint $table) {
            $sql = 'alter table `users_friend_requests` 
                    change `id` `id` int(11) NOT NULL AUTO_INCREMENT,
                    add primary key(`id`);';
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
