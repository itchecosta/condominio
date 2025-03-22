<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\Category;

class ProvidersTableSeeder extends Seeder
{
    public function run()
    {
        // Recupera as categorias criadas
        $frete       = Category::where('name', 'FRETE')->first();
        $vidracaria  = Category::where('name', 'VIDRAÇARIA BOX BANHEIRO')->first();
        $bancada     = Category::where('name', 'BANCADA')->first();
        $moveis      = Category::where('name', 'MOVEIS PLANEJADOS')->first();
        $tela        = Category::where('name', 'TELA DE SEGURANÇA (SACADA)')->first();
        $gesso       = Category::where('name', 'GESSO')->first();
        $ar          = Category::where('name', 'INSTALAÇÃO CENTRAL DE AR')->first();
        $envelopador = Category::where('name', 'ENVELOPADOR PARA MÓVEIS E PAREDES')->first();

        // --- FRETE ---
        Provider::create([
            'category_id' => $frete->id,
            'name'        => 'Christian Frete',
            'phone'       => '91 99232957',
            'description' => 'Caminhão aberto / Não dispõem de carrinhos de carga',
        ]);

        Provider::create([
            'category_id' => $frete->id,
            'name'        => 'Queiroz Frete',
            'phone'       => '91 981003868',
            'description' => 'Caminhão baú / Dispõem de carrinhos de carga',
        ]);

        // --- VIDRAÇARIA BOX BANHEIRO ---
        Provider::create([
            'category_id' => $vidracaria->id,
            'name'        => 'Sam Vidros',
            'phone'       => '91 989380723',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $vidracaria->id,
            'name'        => 'Top Vidros',
            'phone'       => '91 999428499',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $vidracaria->id,
            'name'        => 'Ramos Vidros & Designer',
            'phone'       => '91 988549638 / 91 981837430',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $vidracaria->id,
            'name'        => 'Bira Vidraceiro',
            'phone'       => '91 983725533',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $vidracaria->id,
            'name'        => 'Gustavo Box',
            'phone'       => '91 98558-0169',
            'description' => '',
        ]);

        // --- BANCADA ---
        Provider::create([
            'category_id' => $bancada->id,
            'name'        => 'Rafinha Chaves Marmore',
            'phone'       => '91 982462374',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $bancada->id,
            'name'        => 'Gb Marmore',
            'phone'       => '91 991652639',
            'description' => 'Orçamento: R$ 2.200,00',
        ]);

        Provider::create([
            'category_id' => $bancada->id,
            'name'        => 'Marmoraria Marcossil',
            'phone'       => '91 993200021',
            'description' => '',
        ]);

        // Caso deseje manter dois registros para "Ramos Vidros & Designer" em categorias diferentes:
        Provider::create([
            'category_id' => $bancada->id,
            'name'        => 'Ramos Vidros & Designer',
            'phone'       => '91 988549638 / 91 981837430',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $bancada->id,
            'name'        => 'Josiel Marmore',
            'phone'       => '91 985587630',
            'description' => '',
        ]);

        // --- MOVEIS PLANEJADOS ---
        Provider::create([
            'category_id' => $moveis->id,
            'name'        => 'Alessandra Moveis',
            'phone'       => '91 984941117',
            'description' => '',
        ]);

        // --- TELA DE SEGURANÇA (SACADA) ---
        Provider::create([
            'category_id' => $tela->id,
            'name'        => 'Tela Icui',
            'phone'       => '91 989965510',
            'description' => 'Orçamento: R$ 500,00, tela nacional Equiplex',
        ]);

        // --- GESSO ---
        Provider::create([
            'category_id' => $gesso->id,
            'name'        => 'Juca Gesso',
            'phone'       => '91 983363086',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $gesso->id,
            'name'        => 'Maycon Forro de Gesso',
            'phone'       => '91 983077742',
            'description' => '',
        ]);

        Provider::create([
            'category_id' => $gesso->id,
            'name'        => 'Naldo Gesso',
            'phone'       => '91 991825135',
            'description' => 'Orçamento: R$ 62 / m²',
        ]);

        // --- INSTALAÇÃO CENTRAL DE AR ---
        Provider::create([
            'category_id' => $ar->id,
            'name'        => 'Wendel',
            'phone'       => '91 99278-5694',
            'description' => 'Se for duas instalações, ele faz R$ 250',
        ]);

        Provider::create([
            'category_id' => $ar->id,
            'name'        => 'Rubens',
            'phone'       => '91 98250-2207',
            'description' => '',
        ]);

        // --- ENVELOPADOR PARA MÓVEIS E PAREDES ---
        Provider::create([
            'category_id' => $envelopador->id,
            'name'        => 'Jr',
            'phone'       => '91 98147-3279 / 91 98087-3859',
            'description' => '',
        ]);
    }
}
