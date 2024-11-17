<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // User's name
            $table->string('address');        // User's address
            $table->string('country');        // Country
            $table->string('city');           // City
            $table->string('email')->unique(); // User's email (ensure it's unique)
            $table->string('phone');          // Phone number// Payment method (e.g., credit_card, upi)
            $table->timestamps();             // Created_at and Updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
