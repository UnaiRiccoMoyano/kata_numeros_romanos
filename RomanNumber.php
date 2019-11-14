<?php
Class RomanNumber{

    public $number;
    public $unoRomano = "I";
    public $cincoRomano = "V";
    public $diezRomano = "X";
    public $cinquentaRomano = "L";
    public $cienRomano = "C";
    public $quinientosRomano = "D";
    public $milRomano = "M";

    public function restarHastaDarCero(){
        for($this->number; $this->number>0 && $this->number<4 ; $this->number--){
            print($this->unoRomano);
        }
    }

    public function restarQuinientos(){
        if($this->number>=400 && $this->number<=899)
            {
                $this->number=$this->number-500;
                $this->sumarCienCuandoEsNegativo();
                print($this->quinientosRomano);  
            }
    }

    public function restarCinquenta(){
        if($this->number>=40 && $this->number<=90)
            {
                $this->number=$this->number-50;
                $this->sumarDiezCuandoEsNegativo();
                print($this->cinquentaRomano);  
            }
    }

    public function restarDiezEnDiez(){
        for($this->number; $this->number>=14 &&  $this->number<=39; $this->number=$this->number-10){
            print($this->diezRomano);
        }

    }

    public function restarCienEnCien(){
        for($this->number; $this->number>=140 &&  $this->number<=399; $this->number=$this->number-100){
            $this->sumarDiezCuandoEsNegativo();
            print($this->cienRomano);
        }

    }

    public function restarMil(){
        if($this->number>=900 && $this->number<=1300)
            {
                $this->number=$this->number-1000;
                $this->sumarCienCuandoEsNegativo();
                print($this->milRomano);   
            }
    }

    public function restarCien(){
        if($this->number>=90 && $this->number<=130)
            {
                $this->number=$this->number-100;
                $this->sumarDiezCuandoEsNegativo();
                print($this->cienRomano);   
            }
    }

    public function restarDiez(){
        if($this->number>=9 && $this->number<=13)
            {
                $this->number=$this->number-10;
                $this->sumarUnoCuandoEsNegativo();
                print($this->diezRomano);   
            }
    }

    public function restarCinco(){
        if($this->number>=4 && $this->number<=8)
            {
                $this->number=$this->number-5;
                $this->sumarUnoCuandoEsNegativo();
                print($this->cincoRomano);   
            }
    }
    
    public function sumarDiezCuandoEsNegativo(){
        for($this->number; $this->number<0 ; $this->number=$this->number+10)
                    {
                        print($this->diezRomano);
                    }
    }

    public function sumarCienCuandoEsNegativo(){
        for($this->number; $this->number<0 ; $this->number=$this->number+100)
                    {
                        print($this->cienRomano);
                    }
    }

    public function sumarUnoCuandoEsNegativo(){
        for($this->number; $this->number <0 ; $this->number++)
                    {
                        print($this->unoRomano);
                    }
    }
    
    public function crearUnidad(){
        if($this->number>9 && $this->number<0) {
            return;
        };  
            $this->restarCinco();
            $this->restarHastaDarCero();
    }

    public function crearDecena(){
        $this->restarCinquenta();
        $this->restarDiezEnDiez();
        $this->restarDiez();
    }

    public function crearCentena(){

        $this->restarQuinientos();
        $this->restarCienEnCien();
        $this->restarCien();
    }

    public function crearUnidadDeMil(){
        $this->restarMil();
    }

    public function calcular(){
        $this->crearUnidadDeMil();
        $this->crearCentena();
        $this->crearDecena();
        $this->crearUnidad();
    }
}

$numero = new RomanNumber;
$numero->number = 988;
$numero->calcular();
