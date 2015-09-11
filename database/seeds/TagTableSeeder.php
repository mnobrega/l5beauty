<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 10-09-2015
 * Time: 1:41
 */

use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        Tag::truncate();
        factory(Tag::class,5)->create();
    }
}