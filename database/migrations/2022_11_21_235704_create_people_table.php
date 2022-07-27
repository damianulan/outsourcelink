<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Person;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type'); // 0 - candidate, 1 - employee
            $table->string('firstname');
            $table->string('secondname')->nullable();
            $table->string('surname');
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->char('sex','1')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->integer('citizenships_id')->unsigned();
            $table->foreign('citizenships_id')->references('id')->on('citizenships');
            $table->integer('nations_id')->unsigned();
            $table->foreign('nations_id')->references('id')->on('nations');
            $table->longText('notes')->nullable();
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('nin')->nullable();
            $table->string('nin2')->nullable();
            $table->string('tin')->nullable();
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('users');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('last_editor')->unsigned();
            $table->foreign('last_editor')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();

            // addresses
            $table->integer('res_country')->unsigned()->nullable();
            $table->foreign('res_country')->references('id')->on('nations');
            $table->integer('mail_country')->unsigned()->nullable();
            $table->foreign('mail_country')->references('id')->on('nations');
            $table->string('res_street')->nullable();
            $table->string('mail_street')->nullable();
            $table->string('res_flat')->nullable();
            $table->string('mail_flat')->nullable();
            $table->string('res_postal')->nullable();
            $table->string('mail_postal')->nullable();
            $table->string('res_mailbox')->nullable();
            $table->string('mail_mailbox')->nullable();
            $table->string('res_place')->nullable();
            $table->string('mail_place')->nullable();
            $table->string('res_district')->nullable();
            $table->string('mail_district')->nullable();
            $table->string('res_commune')->nullable();
            $table->string('mail_commune')->nullable();


            //contacts
            $table->string('phone')->nullable();
            $table->string('phone_notes')->nullable();
            $table->string('email')->nullable();
            $table->string('email_notes')->nullable();
            $table->string('viber')->nullable();
            $table->string('viber_notes')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('whatsapp_notes')->nullable();
            $table->string('telegram')->nullable();
            $table->string('telegram_notes')->nullable();
            $table->string('other_contact')->nullable();
            $table->string('other_contact_notes')->nullable();
        });
        $person = Person::factory()->count(2000)->create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
