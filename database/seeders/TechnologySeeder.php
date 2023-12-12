<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        Technology::insert([
            [
                "name" => "Frontend Essencial",
                "description" => "Domínio da tríade HTML, CSS e JavaScript, além de conhecimentos em Typescript.",
                "icon" => json_encode(["html5-original", "css3-original", "javascript-original", "typescript-original"])
            ],
            [
                "name" => "Frameworks Frontend",
                "description" => "Cerca de 2 anos de experiência com React e VueJS, e o essencial de Angular.",
                "icon" => json_encode(["react-original", "vuejs-original", "angularjs-original"])
            ],
            [
                "name" => "NextJS e Nuxt",
                "description" => "Conhecimento de NextJS e Nuxt para desenvolvimento de app full stack.",
                "icon" => json_encode(["nextjs-original", "nuxtjs-original"])
            ],
            [
                "name" => "PHP",
                "description" => "Cerca de 2 anos de experiência com PHP e Laravel.",
                "icon" => json_encode(["php-original", "laravel-plain"])
            ],
            [
                "name" => "NodeJS",
                "description" => "Conhecimento de NodeJS e desenvolvimento de apis com Express, NestJS e AdonisJs.",
                "icon" => json_encode(["nodejs-original", "express-original", "nestjs-plain", "adonisjs-original"])
            ],
            [
                "name" => "Banco de Dados",
                "description" => "Conhecimento em banco de dados relacionais, como MySQL e PostgreSQL.",
                "icon" => json_encode(["mysql-original", "postgresql-original"])
            ],
            [
                "name" => "DevOps",
                "description" => "Conhecimento em Docker, CI/CD com Github Actions e Cloud Hosting com AWS e Digital Ocean.",
                "icon" => json_encode(["docker-original", "amazonwebservices-original", "digitalocean-original"])
            ],
        ]);
    }
}
