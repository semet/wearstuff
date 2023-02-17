<?php

use App\Enums\GenderEnum;
use App\Enums\SizeEnum;
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
            $table->uuid('id')->primary();
            $table->uuid('category_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('sku')->unique();
            $table->string('name');
            $table->integer('price');
            $table->longText('overview'); //Short overview of a product
            $table->longText('description');
            $table->longText('additional_info')->nullable();
            $table->longText('ingredients')->nullable();
            $table->integer('weight');
            $table->enum('size', [array_column(SizeEnum::cases(), 'value')])->nullable();
            $table->enum('gender', [array_column(GenderEnum::cases(), 'value')])->nullable();
            $table->integer('quantity');
            $table->boolean('is_ready')->default(0); //whether the product is ready for sale or no
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
        Schema::dropIfExists('products');
    }
};
