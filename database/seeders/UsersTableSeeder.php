<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Executa os seeders da tabela de usuários.
     *
     * @return void
     */
    public function run()
    {
        // Criação do usuário Admin
        User::create([
            'name'     => 'Administrador',
            'email'    => 'admin@bosquelausanne.com',
            'password' => Hash::make('bosque@102030'),
            'role'     => 'admin',
        ]);

        // Criação do usuário Morador
        User::create([
            'name'     => 'Morador',
            'email'    => 'morador@bosquelausanne.com',
            'password' => Hash::make('morador123'),
            'role'     => 'morador',
        ]);
    }
}
