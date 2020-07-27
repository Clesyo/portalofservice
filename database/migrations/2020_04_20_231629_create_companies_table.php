<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf_cnpj')->unique();
            $table->string('telephone')->nullable();
            $table->string('whatsapp');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        Schema::create('andresses', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 10);
            $table->string('andress');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->char('uf',2);
            $table->string('city');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('coordinates', function (Blueprint $table) {
            $table->id();
            $table->float('lat',10,8);
            $table->float('long',10,8);
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('companies');
        Schema::dropIfExists('andresses');
        Schema::dropIfExists('coordinates');
    }
}
