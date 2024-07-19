<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearImages extends Command
{
    // Le nom et la signature de la commande console.
    protected $signature = 'images:clear';

    // La description de la commande console.
    protected $description = 'Supprime les images stockées dans le dossier public/images';

    // Créer une nouvelle instance de commande.
    public function __construct()
    {
        parent::__construct();
    }

    // Exécuter la commande console.
    public function handle()
    {
        // Le dossier contenant les images stockées
        $directory = 'public/images';

        // Récupérer toutes les images du dossier
        $files = Storage::files($directory);

        // Supprimer chaque fichier
        foreach ($files as $file) {
            Storage::delete($file);
        }

        $this->info('Toutes les images ont été supprimées.');
    }
}


