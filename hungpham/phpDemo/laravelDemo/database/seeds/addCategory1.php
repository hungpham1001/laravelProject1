<?php

use Illuminate\Database\Seeder;

class addCategory1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'parent'=>'Root','categories'=>'Item 1'
        ]);
    }
}
