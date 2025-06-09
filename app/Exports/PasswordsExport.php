<?php

namespace App\Exports;

use App\Models\Password;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PasswordsExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Password::where('user_id', auth()->user()->id)
            ->get(['place', 'username', 'password', 'url', 'category']);
    }

    /**
     * Encabezados de columnas
     */
    public function headings(): array
    {
        return [
            'Sitio',
            'Nombre de Usuario',
            'Contraseña',
            'URL',
            'Categoría'
        ];
    }

    /**
     * Estilos para la hoja de cálculo
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la primera fila (encabezados)
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '888888']]
            ],

            // Estilo para las celdas de contraseñas (columna C)
            'C' => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],

        ];
    }

    /**
     * Ancho de columnas
     */
    public function columnWidths(): array
    {
        return [
            'A' => 25,  // Sitio/Plataforma
            'B' => 25,  // Nombre de Usuario
            'C' => 25,  // Contraseña
            'D' => 30,  // URL
            'E' => 25   // Categoría
        ];
    }

}
