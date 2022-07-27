<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriptions_id')->unsigned();
            $table->foreign('subscriptions_id')->references('id')->on('subscriptions');
            $table->string('firstname');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('title');
            $table->integer('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        $items = [
            ['subscriptions_id' => '1',
            'firstname' => 'Test',
            'surname' => 'Admin',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('123456'),
            'title' => 'Administrator',
            'is_admin' => '1'],
            ['subscriptions_id' => '1',
            'firstname' => 'Test',
            'surname' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'title' => 'Head Recruiter',
            'is_admin' => '0'],
            ['subscriptions_id' => '2',
            'firstname' => 'Test',
            'surname' => 'User2',
            'email' => 'test2@gmail.com',
            'password' => Hash::make('123456'),
            'title' => 'Administrator',
            'is_admin' => '1']
        ];
        
        DB::table('users')->insert($items);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
