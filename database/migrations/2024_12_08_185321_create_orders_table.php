<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->string('company_name')->nullable();
            $table->string('country_region');
            $table->string('street_address');
            $table->string('apartment_suite')->nullable();
            $table->string('town_city');
            $table->string('state');
            $table->string('zip_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
