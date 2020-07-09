<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('label');
        });

        \App\Type::create([
            'title' => 'Deposit',
            'description' => 'Deposit Desc',
            'label' => 'deposit',
        ]);

        \App\Type::create([
            'title' => 'Transfer',
            'description' => 'Transfer Desc',
            'label' => 'transfer',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
