<?php

namespace App\Http\Controllers;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class EnviosController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $envios = Envios::all();

        if (Auth::check() && $user->id_rol == 1 || $user->id_rol == 2) {
            return view('envios.index', compact('envios'));
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
        }
    }

    public function show(Envios $envio)
    {
        $user = Auth::user();
        $clienteEnvio = ClientesEnvios::where('id_envio', $envio->id)->first();
        $cliente = Usuarios::where('id', $clienteEnvio->id_cliente)->first();

        if (Auth::check() && $user) {
            return view('envios.detalle', compact('envio', 'clienteEnvio', 'cliente'));
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }

    public function exportExcel()
    {
        $user = Auth::user();
        if (Auth::check() && ($user->id_rol == 1 || $user->id_rol == 2)) {

            $envios = Envios::all();
        if ($envios->isEmpty()) {
            return redirect()->route('envios.index')->with('error', 'No hay clientes para exportar.');
        }

        // Crea un escritor para archivos XLSX
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToBrowser('envios.xlsx'); // Este método enviará el archivo al navegador

        // Escribir encabezados
        $headerRow = WriterEntityFactory::createRowFromArray([
            'Origen', 'Destinatario', 'Peso', 'Alto', 'Ancho', 'Profundidad', 'Volumen', 'Costo', 'Descripción'
        ]);
        $writer->addRow($headerRow);

        // Escribir datos
        foreach ($envios as $envio) {
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
            ]);
            $writer->addRow($row);
        }

        $writer->close(); 
        exit;
        
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'No puedes ingresar a esta ruta.');
        }
    }

    public function exportPDF()
    {
        $user = Auth::user();
        if (Auth::check() && ($user->id_rol == 1 || $user->id_rol == 2)) {
            $envios = Envios::all();
            $pdf = PDF::loadView('envios.index', compact('envios'));
            return $pdf->download('envios.pdf');
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'No puedes ingresar a esta ruta.');
        }
    }

    public function create()
    {
        $user = Auth::user();
        $clientes = Usuarios::where('id_rol', 3)->get();

        if (Auth::check() && $user) {
            return view('envios.crear', compact('clientes'));
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'origen' => 'required',
            'destinatario' => 'required',
            'peso' => 'required',
            'alto' => 'required',
            'ancho' => 'required',
            'profundidad' => 'required',
            'volumen' => 'required',
            'costo' => 'required',
            'descripcion' => 'required',
            'id_cliente' => 'required|exists:usuarios,id'
        ]);

        $envio = Envios::create($request->all());

        ClientesEnvios::create([
            'id_cliente' => $request->id_cliente,
            'id_envio' => $envio->id,
            'estado' => 'pendiente'
        ]);

        return redirect()->route('envios.index')->with('success', 'Envío creado exitosamente');
    }

    public function edit(Envios $envio)
    {
        $user = Auth::user();
        $cliente = Usuarios::where('id_rol', 3)->get();
        $clienteEnvio = ClientesEnvios::where('id_envio', $envio->id)->first();

        if (!$clienteEnvio) {
            return redirect()->route('envios.index')->with('error', 'Cliente no encontrado para este envío.');
        }

        $id_cliente = $clienteEnvio->id_cliente;
        $estado = $clienteEnvio->estado;

        if (Auth::check() && $user) {
            return view('envios.editar', compact('envio', 'cliente', 'id_cliente', 'estado'));
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }

    public function update(Request $request, Envios $envio)
    {
        $request->validate([
            'origen' => 'required',
            'destinatario' => 'required',
            'peso' => 'required',
            'alto' => 'required',
            'ancho' => 'required',
            'profundidad' => 'required',
            'volumen' => 'required',
            'costo' => 'required',
            'descripcion' => 'required',
            'id_cliente' => 'required|exists:usuarios,id'
        ]);

        $envio->update($request->all());

        ClientesEnvios::where('id_envio', $envio->id)->update([
            'id_cliente' => $request->id_cliente,
            'estado' => $request->estado
        ]);

        return redirect()->route('envios.index')->with('success', 'Envío actualizado exitosamente');
    }

    public function destroy(Envios $envio)
    {
        $envio->delete();
        return redirect()->route('envios.index')->with('success', 'Envío eliminado exitosamente');
    }

    public function detail(Envios $envio)
    {
        $user = Auth::user();
        $clienteEnvio = ClientesEnvios::where('id_envio', $envio->id)->first();

        if (Auth::check() && $user) {
            return view('envios.detalle', compact('envio', 'clienteEnvio'));
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }
}
