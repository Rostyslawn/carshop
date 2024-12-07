<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
    public function importRequest(Request $request)
    {
        $file = $request->file("file");

        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', '300');
        ini_set('upload_max_filesize', '50M');
        ini_set('post_max_size', '50M');

        if(!$file) return redirect("/")->with('error', 'Błąd podczas przetwarzania pliku');

//        products::query()->delete();

        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        foreach ($rows as $index => $row) {
            if ($index == 1) continue;

            $products[] = [
                'product_id' => $row["A"],
                'name' => $row["B"],
                'price' => (float) $row["C"],
                'wholesale' => (float) $row["D"],
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

        return redirect("/")->with('success', 'Dane zostały zaimportowane!');
    }
}
