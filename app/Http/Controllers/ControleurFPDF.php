<?php
namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Codedge\Fpdf\Fpdf\Fpdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ControleurFPDF extends Controller {

    private function drawCard($fpdf, $initiale, $nom, $fonction, $mail, $tel) {
        $fpdf->AddPage("L", ['85', '55']);

        // filigrane background
        $fpdf->SetTextColor(245, 245, 245);
        $fpdf->SetFont('Arial', 'B', 70);
        $fpdf->SetXY(40, 5);
        $fpdf->Cell(40, 35, strtoupper($initiale), 0, 0, 'R');

        // logo carré
        $fpdf->SetFillColor(79, 70, 229);
        $fpdf->Rect(8, 8, 12, 12, 'F');
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->SetXY(8, 8);
        $fpdf->Cell(12, 12, strtoupper($initiale), 0, 0, 'C');

        // infos
        $fpdf->SetTextColor(30, 27, 75);
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->SetXY(8, 22);
        $fpdf->Cell(70, 7, utf8_decode(strtoupper($nom)), 0, 2, 'L');

        $fpdf->SetTextColor(79, 70, 229);
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Cell(70, 4, utf8_decode($fonction), 0, 2, 'L');

        // line
        $fpdf->SetDrawColor(229, 231, 235);
        $fpdf->Line(8, 38, 77, 38);

        // contacts
        $fpdf->SetTextColor(75, 85, 99);

        $fpdf->SetFont('ZapfDingbats', '', 7);
        $fpdf->SetXY(8, 42);
        $fpdf->SetFont('Arial', '', 7);
        $fpdf->Cell(40, 5, $mail, 0, 1, 'L');

        $fpdf->SetFont('ZapfDingbats', '', 7);
        $fpdf->SetXY(8, 47);
        $fpdf->SetFont('Arial', '', 7);
        $fpdf->Cell(40, 5, $tel, 0, 0, 'L');
    }

    public function model() {
        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);
        $this->drawCard($fpdf, "R", "DAMIEN RENAULT", "Programmeur analyste", "damien@univ.fr", "06 00 00 00 00");
        $fpdf->Output();
        exit;
    }

    public function series() {
        $utilisateurs = Utilisateur::all();
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
