<?php

namespace App\Http\Controllers;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientesEnvioController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if (Auth::check() && $user) {
            return view('envios.detalle', compact('clienteEnvio'));
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }

    public function exportExcel(Envios $envio, $id)
    {
        $user = Auth::user();
        $envio = Envios::where('id', $id)->first();
        $clienteEnvio = ClientesEnvios::where('id_envio', $id)->first();
        $cliente = Usuarios::where('id', $clienteEnvio->id_cliente)->first();

        if (Auth::check() && ($user->id_rol == 1 || $user->id_rol == 2)) {

            if (!$clienteEnvio || !$cliente) {
                return redirect()->route('envios.detalle')->with('error', 'No hay clientes para exportar.');
            }

            // Crea un escritor para archivos XLSX
            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToBrowser('detalle-envio.xlsx'); // Este método enviará el archivo al navegador

            // Escribir encabezados
            $headerRow = WriterEntityFactory::createRowFromArray([
                'Origen',
                'Destinatario',
                'Peso',
                'Alto',
                'Ancho',
                'Profundidad',
                'Volumen',
                'Costo',
                'Descripción',
                'Nombre Cliente',
                'Apellido Cliente',
                'Telefono Cliente',
                'Direccion Cliente',
                'Estado Envio'
            ]);
            $writer->addRow($headerRow);

            // Escribir datos
            $row = WriterEntityFactory::createRowFromArray([
                $envio->origen,
                $envio->destinatario,
                $envio->peso,
                $envio->alto,
                $envio->ancho,
                $envio->profundidad,
                $envio->volumen,
                $envio->costo,
                $envio->descripcion,
                $cliente->nombre,
                $cliente->apellido,
                $cliente->telefono,
                $cliente->direccion,
                $clienteEnvio->estado,
            ]);
            $writer->addRow($row);

            $writer->close();
            exit;
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'No puedes ingresar a esta ruta.');
        }
    }

    public function exportPDF(Envios $envio, $id)
    {
        $user = Auth::user();
        if (Auth::check() && ($user->id_rol == 1 || $user->id_rol == 2)) {
            $envio = Envios::where('id', $id)->first();
            $clienteEnvio = ClientesEnvios::where('id_envio', $id)->first();
            $cliente = Usuarios::where('id', $clienteEnvio->id_cliente)->first();

            if (!$clienteEnvio || !$cliente) {
                return redirect()->route('envios.detalle')->with('error', 'No hay datos suficientes para exportar.');
            }

            $pdf = PDF::loadView('envios.detalle', compact('envio', 'clienteEnvio', 'cliente'));
            return $pdf->download('detalle-envio.pdf');
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'No puedes ingresar a esta ruta.');
        }
    }


    public function store() {}

    public function update() {}

    public function destroy() {}
}
