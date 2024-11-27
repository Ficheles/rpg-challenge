<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->foreignId('class_id')->constrained('rpg_classes')->onDelete('cascade');
            // // $table->unsignedBigInteger('guild_id')->nullable()->after('class_id');
            // // $table->foreign('guild_id')->references('id')->on('guilds')->onDelete('set null');
            // $table->foreignId('guild_id')->constrained('guilds')->onDelete('set null')->nullable();
            // $table->integer('xp')->between(1, 100);
            // $table->boolean('confirmed')->default(false);
            // $table->timestamps();    
            
            

            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('guild_id')->nullable();
            $table->integer('xp')->between(1, 100);
            $table->boolean('confirmed')->default(false);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('guild_id')->references('id')->on('guilds')->onDelete('set null');
            $table->foreign('class_id')->references('id')->on('rpg_classes')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropForeign(['guild_id']);
            $table->dropForeign(['class_id']);            
        });

        Schema::dropIfExists('players');
    }
}
