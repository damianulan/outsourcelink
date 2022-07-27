<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('serial')->unique();
            $table->string('name');
            $table->integer('user_limit');
            $table->integer('company_limit');
            $table->timestamps();
        });
        $items = [
            ['serial' => Str::uuid(), 'name' => 'Test client', 'user_limit' => '10', 'company_limit' => '3'],
            ['serial' => Str::uuid(), 'name' => 'Test client 2', 'user_limit' => '10', 'company_limit' => '3']
        ];
        
        DB::table('subscriptions')->insert($items);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
