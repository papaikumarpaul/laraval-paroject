<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Domain;
class DomainController extends Controller
{
    public function checkDNSRecord(Request $request)
    {
        // cliend side data input
        $domain = $request->input('domain');

        // Domain save Model
        Domain::create(['domain' => $domain]);

        // DNS TXT recode check
        $records = dns_get_record($domain, DNS_TXT);

        
        if (!$records) {
            return response()->json([
                'status' => 'error',
                'message' => 'Txt Recode Not Found'
            ], 404);
        }

        // TXT 
        return response()->json([
            'status' => 'success',
            'message' => 'TXT recode found',
            'records' => $records
        ]);
    }
}
