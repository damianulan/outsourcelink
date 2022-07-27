<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        $items = [
            ['id'=>'1', 'name'=>'identity_card'],
            ['id'=>'2', 'name'=>'passport'],
            ['id'=>'3', 'name'=>'visa'],
            ['id'=>'4', 'name'=>'res_card'],
            ['id'=>'5', 'name'=>'drivers_license']

        ];
        DB::table('permits_types')->insert($items);

        Schema::create('permits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('permits_types');
            $table->unsignedInteger('people_id');
            $table->foreign('people_id')->references('id')->on('people');
            $table->date('issued_on')->nullable();
            $table->date('expires_on')->nullable();
            $table->string('issued_by')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
        Schema::dropIfExists('permits_types');

    }
}
