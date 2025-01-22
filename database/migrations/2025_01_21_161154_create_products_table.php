<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('factory_id');
            $table->string('photo')->nullable();
            $table->boolean('have_stock')->default(false);
            $table->string('material_name')->nullable();
            $table->string('marker_number')->nullable();
            $table->enum('status', ['New','Pending', 'Partial', 'Complete', 'Cancel'])->default('New');
            $table->string('code')->unique();
            $table->string('name')->nullable();
            $table->date('store_launch')->nullable();
            $table->decimal('price', 10, 2)->nullable();


            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
