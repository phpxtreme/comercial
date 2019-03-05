<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Bills Table
     *
     * @var string
     */
    private $table = 'bills';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->integer('provider_id')
                ->nullable(false);

            $table->date('date')
                ->nullable(false);

            $table->float('price')
                ->nullable(false);

            $table->string('identifier')
                ->nullable(false)
                ->unique();

            $table->integer('shipping_id')
                ->nullable(false);

            $table->integer('currency_id')
                ->nullable(false);

            $table->text('observations')
                ->nullable(true);

            $table->timestamps();

            $table->foreign('provider_id')
                ->references('id')->on('providers')
                ->onDelete('cascade');

            $table->foreign('shipping_id')
                ->references('id')->on('shippings')
                ->onDelete('cascade');

            $table->foreign('currency_id')
                ->references('id')->on('currencies')
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
