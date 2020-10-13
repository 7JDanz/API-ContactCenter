<?php

namespace App\Http\Controllers\Api\Clientes;

use App\Http\Controllers\Controller;
use App\Models\MdmClientes\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente($documento){
        return Cliente::where("Ruc_Cedula",$documento)
            ->with(["telefonos","telefonos.direcciones"])
            ->get();
    }

    public function clientePorEmail($email){
        return Cliente::where("Correo",$email)
            ->with(["telefonos","telefonos.direcciones"])
            ->get();
    }

    public function clientePorTelefono($telefono){
        return Cliente::whereHas('telefonos', function($q) use($telefono)
        {
            $q->where('Telefono',$telefono);

        })
            ->with(["telefonos","telefonos.direcciones"])
            ->get();
    }

}
