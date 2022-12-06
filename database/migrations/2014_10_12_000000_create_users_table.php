<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // ¡CREACIÓN DE LOS USUARIOS CON ROLES!
        $user = new User();
        $user->name = 'super-admin';
        $user->email = 'superadmin@mail.com';
        $user->password = Hash::make('1234');
        $user->save();

        $user2 = new User();
        $user2->name = 'student-admin';
        $user2->email = 'studentadmin@mail.com';
        $user2->password = Hash::make('1234');
        $user2->save();

        $user3 = new User();
        $user3->name = 'course-input';
        $user3->email = 'courseinput@mail.com';
        $user3->password = Hash::make('1234');
        $user3->save();

        $user4 = new User();
        $user4->name = 'prof-input';
        $user4->email = 'profinput@mail.com';
        $user4->password = Hash::make('1234');
        $user4->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
