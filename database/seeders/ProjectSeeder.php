<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::insert([
            [
                "uuid" => "4152f005-0bab-456d-a8ed-66077d0382a7",
                "phase" => "finalizado",
                "name" => "Portfolio v1",
                "description" => "Primeira versão do portfolio, feita com NextJS e hospedada na Vercel.",
                "technology" => json_encode(["NextJS 13 + TypeScript", "Tailwind CSS", "Prisma ORM", "Planet Scale", "Auth0", "Vercel"])
            ],
            [
                "uuid" => "2804d4b9-397e-4ae5-b3cb-c71d1ce30c5f",
                "phase" => "produção",
                "name" => "Portfolio v2",
                "description" => "Segunda versão do portfolio, que é a atual, feita com Laravel, VueJS e hospedada na AWS.",
                "technology" => json_encode(["Laravel 10", "InertiaJS", "VueJS 3 + TypeScript", "Tailwind CSS", "AWS"])
            ],
            [
                "uuid" => "9745d333-92f8-4e90-86ee-3003f09c71d3",
                "phase" => "planejamento",
                "name" => "OctoPages",
                "description" => "SaaS para criação de páginas de venda, feito com Laravel, VueJS e hospedado na AWS.",
                "technology" => json_encode(["Laravel 10", "InertiaJS", "VueJS 3 + TypeScript", "Tailwind CSS", "AWS"])
            ],
            [
                "uuid" => "83a80791-c0d3-430b-bcb8-274aec4e8ff5",
                "phase" => "ideia",
                "name" => "OctoBills",
                "description" => "App Android para o controle das finanças pessoais, feito com React Native e hospedado na AWS.",
                "technology" => json_encode(["Laravel 10", "React Native + TypeScript", "Tailwind CSS", "AWS"])
            ]
        ]);
    }
}
