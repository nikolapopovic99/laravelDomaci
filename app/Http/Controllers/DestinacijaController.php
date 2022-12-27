<?php

namespace App\Http\Controllers;

use App\Http\Resources\DestinacijaResurs;
use App\Models\Destinacija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinacijaController extends BaseController
{
    public function index()
    {
        $destinacije = Destinacija::all();
        return $this->uspesnoOdgovor(DestinacijaResurs::collection($destinacije), 'Vracene su sve destinacije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'destinacija' => 'required',
            'drzava' => 'required',
            'datum' => 'required'
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $destinacija = Destinacija::create($input);

        return $this->uspesnoOdgovor(new DestinacijaResurs($destinacija), 'Nova destinacija je kreirana.');
    }


    public function show($id)
    {
        $destinacija = Destinacija::find($id);
        if (is_null($destinacija)) {
            return $this->greskaOdgovor('Destinacija sa zadatim ID-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new DestinacijaResurs($destinacija), 'Destinacija sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $destinacija = Destinacija::find($id);
        if (is_null($destinacija)) {
            return $this->greskaOdgovor('Destinacija sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'destinacija' => 'required',
            'drzava' => 'required',
            'datum' => 'required'
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $destinacija->destinacija = $input['destinacija'];
        $destinacija->drzava = $input['drzava'];
        $destinacija->datum = $input['datum'];
        $destinacija->save();

        return $this->uspesnoOdgovor(new DestinacijaResurs($destinacija), 'Destinacija je azurirana.');
    }

    public function destroy($id)
    {
        $destinacija = Destinacija::find($id);
        if (is_null($destinacija)) {
            return $this->greskaOdgovor('Destinacija sa zadatim ID-em ne postoji.');
        }
        $destinacija->delete();
        return $this->uspesnoOdgovor([], 'Destinacija je obrisana.');
    }
}
