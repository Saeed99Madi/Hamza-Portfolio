<?php

use App\Models\Kind;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Kind::create([
            'name' => 'Architecture',
            'title' =>  'cat-1'
        ]);
        Kind::create([
            'name' => 'Decore',
            'title' =>  'cat-2'

        ]);
        Kind::create([
            'name' => 'Outdoor',
            'title' =>  'cat-3'

        ]);
        Kind::create([
            'name' => 'Interiors',
            'title' =>  'cat-4'

        ]);
        Kind::create([
            'name' => 'Residential',
            'title' =>  'cat-5'

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Kind::whereRaw('title = ?', 'cat-1')
            ->delete();
        Kind::whereRaw('title = ?', 'cat-2')
            ->delete();
        Kind::whereRaw('title = ?', 'cat-3')
            ->delete();
        Kind::whereRaw('title = ?', 'cat-4')
            ->delete();
        Kind::whereRaw('title = ?', 'cat-5')
            ->delete();

    }
}
