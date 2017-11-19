<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateVisits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('visits')->insert([
            'user_id' => '1',
            'city_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '1',
            'city_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '1',
            'city_id' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '2',
            'city_id' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '2',
            'city_id' => '5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '3',
            'city_id' => '6',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '3',
            'city_id' => '7',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '4',
            'city_id' => '8',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '4',
            'city_id' => '9',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '4',
            'city_id' => '10',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '5',
            'city_id' => '11',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '5',
            'city_id' => '12',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '5',
            'city_id' => '13',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '6',
            'city_id' => '14',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '6',
            'city_id' => '15',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')])
        ;
        DB::table('visits')->insert([
            'user_id' => '6',
            'city_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '7',
            'city_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '7',
            'city_id' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '7',
            'city_id' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
        DB::table('visits')->insert([
            'user_id' => '7',
            'city_id' => '5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]
        );
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
