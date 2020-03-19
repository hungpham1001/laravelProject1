<?php

use Illuminate\Database\Seeder;

class addCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['parent'=>null,'categories'=>'Root'],
            ['parent'=>'Root','categories'=>'Item 1'],
            ['parent'=>'Root','categories'=>'Item 2'],
            ['parent'=>'Root','categories'=>'Item 3'],
            ['parent'=>'Root','categories'=>'Item 4'],
            ['parent'=>'Item 1','categories'=>'Sub Item 1.1'],
            ['parent'=>'Item 1','categories'=>'Sub Item 1.2'],
            ['parent'=>'Item 1','categories'=>'Sub Item 1.3'],
            ['parent'=>'Item 2','categories'=>'Sub Item 2.1'],
            ['parent'=>'Item 2','categories'=>'Sub Item 2.2'],
            ['parent'=>'Item 2','categories'=>'Sub Item 2.3'],
            ['parent'=>'Item 2','categories'=>'Sub Item 2.4'],
            ['parent'=>'Item 3','categories'=>'Sub Item 3.1'],
            ['parent'=>'Item 3','categories'=>'Sub Item 3.2'],
            ['parent'=>'Item 3','categories'=>'Sub Item 3.3'],
            ['parent'=>'Sub Item 1.1','categories'=>'Sub Item 1.1.1'],
            ['parent'=>'Sub Item 1.1','categories'=>'Sub Item 1.1.2'],
            ['parent'=>'Sub Item 1.1','categories'=>'Sub Item 1.1.3'],
            ['parent'=>'Sub Item 1.2','categories'=>'Sub Item 1.2.1'],
            ['parent'=>'Sub Item 1.2','categories'=>'Sub Item 1.2.2'],
            ['parent'=>'Sub Item 1.2','categories'=>'Sub Item 1.2.3'],
            ['parent'=>'Sub Item 2.1','categories'=>'Sub Item 2.1.1'],
            ['parent'=>'Sub Item 2.1','categories'=>'Sub Item 2.1.2'],
            ['parent'=>'Sub Item 2.1','categories'=>'Sub Item 2.1.3'],
        ]);
    }
}
