<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Groups Table
     *
     * @var string
     */
    private $table = 'groups';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->text('name')
                ->nullable(false);

            $table->float('price')
                ->nullable(false);

            $table->boolean('active')
                ->default(true);

            $table->integer('provider_id')
                ->nullable(false);

            $table->timestamps();

            $table->foreign('provider_id')
                ->references('id')->on('providers')
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
