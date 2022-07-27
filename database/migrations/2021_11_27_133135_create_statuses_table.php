<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type'); // 0-candidates, 1-employees, 2-partners, 3-clients, 4-projects, 5-tasks
        });

        $items = [
            ['id'=>'1', 'name'=>'Active', 'type'=>'0'],
            ['id'=>'2', 'name'=>'Inactive', 'type'=>'0'],
            ['id'=>'3', 'name'=>'Pending', 'type'=>'0'],
            ['id'=>'4', 'name'=>'Accepted', 'type'=>'0'],
            ['id'=>'5', 'name'=>'In progress', 'type'=>'0'],
            ['id'=>'6', 'name'=>'On hold', 'type'=>'0'],

            ['id'=>'7', 'name'=>'Active', 'type'=>'1'],
            ['id'=>'8', 'name'=>'Inactive', 'type'=>'1'],
            ['id'=>'9', 'name'=>'Pending', 'type'=>'1'],
            ['id'=>'10', 'name'=>'Working', 'type'=>'1'],
            ['id'=>'11', 'name'=>'Holidays', 'type'=>'1'],
            ['id'=>'12', 'name'=>'On hold', 'type'=>'1'],

            ['id'=>'13', 'name'=>'Active', 'type'=>'3'],
            ['id'=>'14', 'name'=>'Inactive', 'type'=>'3'],
            ['id'=>'15', 'name'=>'Pending', 'type'=>'3'],

            ['id'=>'16', 'name'=>'New', 'type'=>'5'],
            ['id'=>'17', 'name'=>'Pending', 'type'=>'5'],
            ['id'=>'18', 'name'=>'Completed', 'type'=>'5'],

        ];
        DB::table('statuses')->insert($items);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
