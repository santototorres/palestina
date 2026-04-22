<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\FaqItem;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Example Page Seed
        $homePage = Page::firstOrCreate(['slug' => 'home', 'type' => 'home']);
        
        $homePage->translations()->updateOrCreate(['locale' => 'it'], [
            'title' => 'Stiamo raccogliendo le firme per l\'iniziativa popolare federale',
            'subtitle' => 'Un atto di giustizia. Una richiesta di dignità.',
            'body' => 'Contenuto migrato dal sito originale palestinasi.ch'
        ]);

        $homePage->translations()->updateOrCreate(['locale' => 'fr'], [
            'title' => 'Nous récoltons des signatures pour l\'initiative populaire fédérale',
            'subtitle' => 'Un acte de justice. Une demande de dignité.',
            'body' => 'Contenu migré du site original palestinasi.ch'
        ]);

        // Example FAQ Seed
        $faq = FaqItem::firstOrCreate(['page_slug' => 'home', 'sort_order' => 1]);
        $faq->translations()->updateOrCreate(['locale' => 'it'], [
            'question' => 'Chi può firmare?',
            'answer' => 'Tutti i cittadini svizzeri con diritto di voto a livello federale.'
        ]);
    }
}