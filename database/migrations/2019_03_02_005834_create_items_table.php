<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Items Table
     *
     * @var string
     */
    private $table = 'items';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->text('description')
                ->nullable(false);

            $table->integer('quantity')
                ->nullable(false);

            $table->integer('measurement_id')
                ->nullable(false);

            $table->string('model')
                ->nullable(true);

            $table->float('unit_price')
                ->nullable(true);

            $table->float('price')
                ->nullable(false);

            $table->integer('currency_id')
                ->nullable(false);

            $table->integer('group_id')
                ->nullable(false);

            $table->timestamps();

            $table->foreign('measurement_id')
                ->references('id')->on('measurements')
                ->onDelete('cascade');

            $table->foreign('currency_id')
                ->references('id')->on('currencies')
                ->onDelete('cascade');

            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
