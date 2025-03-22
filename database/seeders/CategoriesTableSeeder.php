<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'FRETE', 'description' => 'Serviços de frete'],
            ['name' => 'VIDRAÇARIA BOX BANHEIRO', 'description' => 'Fornecedores de vidros para box e banheiros'],
            ['name' => 'BANCADA', 'description' => 'Fornecedores de bancadas e mármore'],
            ['name' => 'MOVEIS PLANEJADOS', 'description' => 'Fornecedores de móveis planejados'],
            ['name' => 'TELA DE SEGURANÇA (SACADA)', 'description' => 'Fornecedores de telas de segurança para sacadas'],
            ['name' => 'GESSO', 'description' => 'Serviços de gesso e forros'],
            ['name' => 'INSTALAÇÃO CENTRAL DE AR', 'description' => 'Serviços de instalação de ar condicionado central'],
            ['name' => 'ENVELOPADOR PARA MÓVEIS E PAREDES', 'description' => 'Serviços de envelopamento para móveis e paredes'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
