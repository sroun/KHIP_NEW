<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->default(0);
            $table->date('date');
            $table->boolean('publish');
            $table->boolean('trash');
            $table->integer('user_id');
            $table->integer('user_modify');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoryproducts');
    }
}
