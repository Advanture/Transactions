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

        Advanture\Transactions\Models\Type::create([
            'title' => 'Deposit',
            'description' => 'Deposit Desc',
            'label' => 'deposit',
        ]);

        Advanture\Transactions\Models\Type::create([
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
