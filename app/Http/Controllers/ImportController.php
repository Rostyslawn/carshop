<?php

namespace App\Http\Controllers;

use App\Models\products;
use Database\Seeders\ProductsSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
    public function importRequest(Request $request)
    {
        $file = $request->file("file");

        if(!$file) return redirect("/")->with('error', 'Ошибка при обработке файла');

        products::query()->delete();

        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        foreach ($rows as $index => $row) {
            if ($index == 1) continue;

            $products[] = [
                'product_id' => $row["A"],
                'name' => $row["B"],
                'price' => (float) $row["C"],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($products) >= 1000) {
                DB::table("products")->insert($products);
                $products = [];
            }
        }

        if (count($products) > 0) {
            DB::table('products')->insert($products);
        }

        return redirect("/")->with('success', 'Данные успешно импортированы!');
    }
}
