<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class CsvDownloadController extends Controller
{
    
    public function downloadCsv(Request $request)
    {
        $contacts = Contact::where('id','>',0 )->EmailOrNameSearch($request->search)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->get();

        $csvHeader = [
            'id',
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail',
            'created_at',
            'updated_at',
        ];

        $csvData = $contacts -> toArray();
        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);

        return $response;
    }
}