<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class ControleurFPDF extends Controller {

    public function model() {
        $this->fpdf = new Fpdf;
        $this->fpdf->SetAutoPageBreak(false);
        $this->fpdf->AddPage("L", ['85', '55']);

        $this->fpdf->SetTextColor(20,40,80);
        $this->fpdf->SetDrawColor(20,40,80);
        $this->fpdf->SetLineWidth(0.5);
        $this->fpdf->SetFont('Times','',48);
        $this->fpdf->SetXY(5,5);
        $this->fpdf->Cell(75,16,"R",0,2,"C");

        $this->fpdf->SetFont('Times','B',8);
        $this->fpdf->Cell(75,5,"DAMIEN RENAULT",0,2,"C");
        $this->fpdf->Cell(75,5,"Programmeur analyste",0,2,"C");
        $this->fpdf->Line(10,35,80,35);
        $this->fpdf->SetFont('Helvetica','',6);
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetXY(5,40);
        $this->fpdf->Cell(75,5,"damien@univ-grenoble-alpes.fr",0,2,"C");
        $this->fpdf->Cell(75,5,"06 83 68 36 85",0,0,"C");

        $this->fpdf->Output();
        exit;
    }

    public function demoseries()
    {
        $cartes = config('demonstration.cartes');

        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);

        foreach ($cartes as $carte) {
            $fpdf->AddPage("L", ['85', '55']);

            $fpdf->SetTextColor(20,40,80);
            $fpdf->SetFont('Times','',48);
            $fpdf->SetXY(5,5);
            $fpdf->Cell(75,16,$carte['initiale'],0,2,"C");

            $fpdf->SetFont('Times','B',8);
            $fpdf->Cell(75,5,$carte['prenomNom'],0,2,"C");
            $fpdf->Cell(75,5,$carte['fonction'],0,2,"C");

            $fpdf->Line(10,35,80,35);

            $fpdf->SetFont('Helvetica','',6);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->SetXY(5,40);
            $fpdf->Cell(75,5,$carte['mail'],0,2,"C");
            $fpdf->Cell(75,5,$carte['telephone'],0,0,"C");
        }

        $fpdf->Output();
        exit;
    }

    public function series()
    {
        $utilisateurs = Utilisateur::all();
        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);

        foreach ($utilisateurs as $u) {
            $fpdf->AddPage("L", ['85', '55']);

            $fpdf->SetTextColor(20,40,80);
            $fpdf->SetFont('Times','',48);
            $fpdf->SetXY(5,5);
            $fpdf->Cell(75,16, $u->initiale, 0, 2, "C");

            $fpdf->SetFont('Times','B',8);
            // Utilisation de utf8_decode pour les accents
            $fpdf->Cell(75,5, utf8_decode(strtoupper($u->prenomNom)), 0, 2, "C");
            $fpdf->Cell(75,5, utf8_decode($u->fonction), 0, 2, "C");

            $fpdf->Line(10,35,80,35);

            $fpdf->SetFont('Helvetica','',6);
            $fpdf->SetTextColor(0,0,0);
            $fpdf->SetXY(5,40);
            $fpdf->Cell(75,5, $u->mail, 0, 2, "C");
            $fpdf->Cell(75,5, $u->telephone, 0, 0, "C");
        }

        $fpdf->Output();
        exit;
    }

    public function solo(Utilisateur $utilisateur)
    {
        $fpdf = new Fpdf;
        $fpdf->SetAutoPageBreak(false);
        $fpdf->AddPage("L", ['85', '55']);

        $fpdf->SetTextColor(20,40,80);
        $fpdf->SetFont('Times', '', 48);
        $fpdf->SetXY(5, 5);
        $fpdf->Cell(75, 16, $utilisateur->initiale, 0, 2, "C");

        $fpdf->SetFont('Times', 'B', 8);
        $fpdf->Cell(75, 5, utf8_decode(strtoupper($utilisateur->prenomNom)), 0, 2, "C");
        $fpdf->Cell(75, 5, utf8_decode($utilisateur->fonction), 0, 2, "C");

        $fpdf->Line(10, 35, 80, 35);

        $fpdf->SetFont('Helvetica', '', 6);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->SetXY(5, 40);
        $fpdf->Cell(75, 5, $utilisateur->mail, 0, 2, "C");
        $fpdf->Cell(75, 5, $utilisateur->telephone, 0, 0, "C");

        $fpdf->Output();
        exit;
    }
}
