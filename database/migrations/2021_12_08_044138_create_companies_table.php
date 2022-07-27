<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Company;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fullname')->nullable();
            $table->integer('subscriptions_id')->unsigned();
            $table->foreign('subscriptions_id')->references('id')->on('subscriptions');
            $table->integer('created_by_user')->unsigned();
            $table->foreign('created_by_user')->references('id')->on('users');
            $table->timestamps();
        });
        $items = [
            ['name' => 'Company Inc.', 'fullname' => 'Company Incorporated', 'created_by_user' => '1', 'subscriptions_id' => '1'],
            ['name' => 'Firma', 'fullname' => 'Firma sp. z o.o.', 'created_by_user' => '1', 'subscriptions_id' => '1'],
            ['name' => 'Business Inc.', 'fullname' => 'Business Incorporated', 'created_by_user' => '2', 'subscriptions_id' => '2'],
            ['name' => 'Organizacja', 'fullname' => 'Organizacja sp. z o.o.', 'created_by_user' => '2', 'subscriptions_id' => '2']
        ];
        
        DB::table('companies')->insert($items);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
