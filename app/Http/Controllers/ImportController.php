<?php

namespace App\Http\Controllers;

use App\Models\products;
use Database\Seeders\ProductsSeeder;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
    public function importRequest(Request $request)
    {
        $file = $request->file("file");

        if(!$file) return redirect("/")->with('error', 'Ошибка при обработке файла');

        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        foreach ($rows as $index => $row) {
            if ($index == 1) continue;

            $product = new products();
            $product->product_id = $row["A"];
            $product->name = $row["B"];
            $product->price = (float) $row["C"];
            $product->save();
        }

        return redirect("/")->with('success', 'Данные успешно импортированы!');
    }
}
