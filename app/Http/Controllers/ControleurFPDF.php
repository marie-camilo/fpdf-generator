<?php
namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Codedge\Fpdf\Fpdf\Fpdf;

class ControleurFPDF extends Controller {

    private function drawCard($fpdf, $initiale, $nom, $fonction, $mail, $tel) {
        $fpdf->AddPage("L", ['85', '55']);

        $fpdf->SetTextColor(250, 250, 250);
        $fpdf->SetFont('Arial', 'B', 80);
        $fpdf->SetXY(35, 2);
        $fpdf->Cell(50, 50, utf8_decode(strtoupper($initiale)), 0, 0, 'R');

        $fpdf->SetFillColor(44, 130, 144);
        $fpdf->Rect(8, 8, 14, 14, 'F');
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->SetXY(8, 8);
        $fpdf->Cell(14, 14, utf8_decode(strtoupper($initiale)), 0, 0, 'C');

        $fpdf->SetTextColor(33, 60, 93);
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->SetXY(8, 25);
        $fpdf->Cell(70, 7, utf8_decode(strtoupper($nom)), 0, 2, 'L');

        $fpdf->SetTextColor(44, 130, 144);
        $fpdf->SetFont('Arial', 'B', 8);
        $fpdf->Cell(70, 4, utf8_decode(strtoupper($fonction)), 0, 2, 'L');

        $fpdf->SetDrawColor(240, 240, 240);
        $fpdf->Line(8, 39, 77, 39);

        $fpdf->SetFont('Arial', '', 7);
        $fpdf->SetTextColor(75, 85, 99);

        // Ligne Email
        $fpdf->SetFillColor(44, 130, 144);
        $fpdf->Rect(8, 43, 1.5, 1.5, 'F');
        $fpdf->SetXY(11, 41.5);
        $fpdf->Cell(40, 5, utf8_decode($mail), 0, 1, 'L');

        $fpdf->SetFillColor(173, 134, 63);
        $fpdf->Rect(8, 48, 1.5, 1.5, 'F');
        $fpdf->SetXY(11, 46.5);
        $fpdf->Cell(40, 5, utf8_decode($tel), 0, 0, 'L');

        $fpdf->SetFillColor(33, 60, 93);
        $fpdf->Rect(0, 54, 85, 1, 'F');
    }

    public function model() {
        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);
        $this->drawCard($fpdf, "DR", "DAMIEN RENAULT", "Programmeur analyste", "damien@univ.fr", "06 00 00 00 00");
        $fpdf->Output();
        exit;
    }

    public function series() {
        $utilisateurs = auth()->user()->utilisateurs;

        if($utilisateurs->isEmpty()) {
            return "Vous n'avez aucune carte à imprimer.";
        }

        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);
        foreach ($utilisateurs as $u) {
            $this->drawCard($fpdf, $u->initiale, $u->prenomNom, $u->fonction, $u->mail, $u->telephone);
        }
        $fpdf->Output();
        exit;
    }

    public function solo(Utilisateur $utilisateur) {
        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);
        $this->drawCard($fpdf, $utilisateur->initiale, $utilisateur->prenomNom, $utilisateur->fonction, $utilisateur->mail, $utilisateur->telephone);
        $fpdf->Output();
        exit;
    }

    public function demoseries() {
        $cartes = config('demonstration.cartes') ?? [];
        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);
        foreach ($cartes as $carte) {
            $this->drawCard($fpdf, $carte['initiale'], $carte['prenomNom'], $carte['fonction'], $carte['mail'], $carte['telephone']);
        }
        $fpdf->Output();
        exit;
    }
}
