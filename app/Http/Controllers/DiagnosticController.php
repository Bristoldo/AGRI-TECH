<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiagnosticController extends Controller
{

    public function index()
    {
        return view('diagnostic');
    }

    public function get_predictions(Request $request)
    {

        // Valider que l'image est bien présente dans la requête
        $request->validate([
            'image' => 'required|image|max:2048', // vous pouvez ajuster les règles de validation
        ]);

        // Enregistrer l'image sur le serveur
        $path = $request->file('image')->store('public/images');

        // Récupérer le chemin de l'image
        $imagePath = Storage::url($path);


        $client = new Client();
        $multipart = [
            [
                'name'     => 'file',
                'contents' => fopen($request->file('image')->getPathname(), 'r'),
                'filename' => $request->file('image')->getClientOriginalName()
            ],
        ];

        try {
            $response = $client->post(env('FASTAPI_URL'), [
                'multipart' => $multipart,
            ]);

            $responseCode = $response->getStatusCode();

            if ($responseCode == 200) {

                $prediction = json_decode($response->getBody()->getContents(), true);

                return view('contents.diagnostic')->with('image', $imagePath)->with('prediction', $prediction);
            } else {
                abort(403);
            }
        } catch (\Exception $e) {
            // Gérer les exceptions, par exemple afficher une erreur à l'utilisateur
            return back()->withErrors(['msg' => 'Une erreur est survenue lors de la communication avec le serveur de prédiction.']);
        }
    }
}
