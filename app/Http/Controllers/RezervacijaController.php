<?php

namespace App\Http\Controllers;

use App\Http\Resources\RezervacijaResurs;
use App\Models\Rezervacija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RezervacijaController extends BaseController
{
    public function index()
    {
        $rezervacije = Rezervacija::all();
        return $this->uspesnoOdgovor(RezervacijaResurs::collection($rezervacije), 'Vracene su sve rezervacije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'brojPasosa' => 'required',
            'destinacijaID' => 'required',
            'tipID' => 'required'
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $rezervacija = Rezervacija::create($input);

        return $this->uspesnoOdgovor(new RezervacijaResurs($rezervacija), 'Nova rezervacija je kreirana.');
    }


    public function show($id)
    {
        $rezervacija = Rezervacija::find($id);
        if (is_null($rezervacija)) {
            return $this->greskaOdgovor('Rezervacija sa zadatim ID-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new RezervacijaResurs($rezervacija), 'Rezervacija sa zadatim ID-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $rezervacija = Rezervacija::find($id);
        if (is_null($rezervacija)) {
            return $this->greskaOdgovor('Rezervacija sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'brojPasosa' => 'required',
            'destinacijaID' => 'required',
            'tipID' => 'required'
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $rezervacija->ime = $input['ime'];
        $rezervacija->prezime = $input['prezime'];
        $rezervacija->brojPasosa = $input['brojPasosa'];
        $rezervacija->destinacijaID = $input['destinacijaID']; 
        $rezervacija->tipID = $input['tipID']; 
        $rezervacija->save();

        return $this->uspesnoOdgovor(new RezervacijaResurs($rezervacija), 'Rezervacija je azurirana.');
    }

    public function destroy($id)
    {
        $rezervacija = Rezervacija::find($id);
        if (is_null($rezervacija)) {
            return $this->greskaOdgovor('Rezervacija sa zadatim ID-em ne postoji.');
        }

        $rezervacija->delete();
        return $this->uspesnoOdgovor([], 'Rezervacija je obrisana.');
    }
}
