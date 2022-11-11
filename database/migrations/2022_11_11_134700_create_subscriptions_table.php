<?php

use App\Enums\FinancingType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->json("lead_data");
            $table->string("financing_type")->default(FinancingType::CPF->value);
            $table->string("cpf_amount")->nullable();
            $table->string("cpf_dossier_number")->nullable();
            $table->string("cpf_start_date")->nullable();
            $table->foreignId("course_id")->nullable()->constrained()->onDelete("set null")->onUpdate("set null");
            $table->foreignId("plan_id")->nullable()->constrained()->onDelete("set null")->onUpdate("set null");
            $table->foreignId("lead_id")->nullable()->constrained()->onDelete("set null")->onUpdate("set null");
            $table->timestamp('completed_at')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
};