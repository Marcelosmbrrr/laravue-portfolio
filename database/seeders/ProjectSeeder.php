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
                "uuid" => "1995f057-a876-4215-b947-40dbbc83fe79",
                "phase" => "finalizado",
                "name" => "Portfolio v1",
                "description" => "Primeira versão do portfolio, feita com NextJS e hospedada na Vercel.",
                "technology" => json_encode(["NextJS 13 + TypeScript", "Tailwind CSS", "Prisma ORM", "Planet Scale", "Auth0", "Vercel"]),
                "image_path" => "projects/1995f057-a876-4215-b947-40dbbc83fe79/img1.png",
            ],
            [
                "uuid" => "c36d5994-5fb2-4d32-8a75-2cfc769f9eaf",
                "phase" => "produção",
                "name" => "Portfolio v2",
                "description" => "Segunda versão do portfolio, que é a atual, feita com Laravel, VueJS e hospedada na AWS.",
                "technology" => json_encode(["Laravel 10", "InertiaJS", "VueJS 3", "TypeScript", "Tailwind CSS", "AWS"]),
                "image_path" => "projects/c36d5994-5fb2-4d32-8a75-2cfc769f9eaf/img1.png",
            ],
            [
                "uuid" => "9745d333-92f8-4e90-86ee-3003f09c71d3",
                "phase" => "planejamento",
                "name" => "OctoPages",
                "description" => "SaaS para criação de páginas de venda, feito com Laravel, VueJS e hospedado na AWS.",
                "technology" => json_encode(["Laravel 10", "InertiaJS", "VueJS 3", "TypeScript", "Tailwind CSS", "AWS"]),
                "image_path" => "projects/9745d333-92f8-4e90-86ee-3003f09c71d3/img1.png",
            ],
            [
                "uuid" => "f7c0099f-5816-4b18-943f-260c7f71e7a3",
                "phase" => "ideia",
                "name" => "OctoBills",
                "description" => "App Android para o controle das finanças pessoais, feito com React Native e hospedado na AWS.",
                "technology" => json_encode(["Laravel 10", "React Native", "TypeScript", "Tailwind CSS", "AWS"]),
                "image_path" => "projects/f7c0099f-5816-4b18-943f-260c7f71e7a3/img1.png",
            ],
            [
                "uuid" => "83a5551-c0d3-430b-bc38-924azy4e8fg7",
                "phase" => "ideia",
                "name" => "AtençãoPelotas",
                "description" => "App Android para os eleitores de Pelotas acompanharem seus candidatos, feito com React Native e hospedado na AWS.",
                "technology" => json_encode(["Laravel 10", "React Native", "TypeScript", "Tailwind CSS", "AWS"]),
                "image_path" => "projects/83a5551-c0d3-430b-bc38-924azy4e8fg7/img1.png",
            ]
        ]);
        
    }
}
