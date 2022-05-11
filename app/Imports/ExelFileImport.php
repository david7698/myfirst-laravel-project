<?php

namespace App\Imports;

use App\Models\Books;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use LengthException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class ExelFileImport implements WithMappedCells, ToCollection
{

    public function mapping(): array
    {
        return [
            // InsurancePolicy
            'insurancepolicy.durata' => 'C7',
            'insurancepolicy.capitale' => 'C6',
            // InsurancePolicySubject
            // type_id 1 - Contraente
            'policy_holder.details.anag_document.document_city.paz.min' => 'C13',

            'policy_holder.details.anag_document.pippo' => 'C13',

            'policy_holder.details.firstname' => 'C11',

            'policy_holder.details.lastname' => 'C12',

            'policy_holder.details.codfiscale' => 'C13',


            'policy_holder.address.via' => 'C13',
            'policy_holder.address.citta' => 'C13',

            // type_id 3 - Beneficiario
            'beneficiario_1.firstname' => 'C34',

            'beneficiario_1.lastname' => 'C35',

            // type_id 3 - Beneficiario
            'beneficiario_2.details.firstname' => 'C34',

            'beneficiario_2.details.lastname' => 'C35',

        ];
    }

    public function computed(): array
    {
        return [
            // type_id 1 - Contraente
            'policy_holder.type_id' => 1,
            'policy_holder.identifier' => '{policy_holder.details.firstname}                           {policy_holder.details.lastname} {policy_holder.details.codfiscale}',


            //beneficiario1 
            'beneficiario_1.details.type_id' => 3,
            'beneficiario_1.details.identifier' => 'pippo {beneficiario_1.firstname}-{beneficiario_1.lastname}',
            //beneficiario2
            'beneficiario_2.type_id' => 3,
            'beneficiario_2.identifier' => '{beneficiario_2.details.firstname} {beneficiario_2.details.lastname}',
        ];
    }



    public function collection(Collection $rows)
    {

        /*
        $result = [
            'insurancepolicy' => [
                'durata' => "3",
                'capitale' => "75000"

            ],
            'policy_holder' => [
                'type_id' => 1,
                'identifier' => "Nome Cognome", //concatenati
                'details' => [
                    'firstname' => 'Nome',
                    'lastname' => 'Nome',
                    'codfiscale' => 'Nome',
                ]
            ],
            'beneficiario_1' => [
                'type_id' => 3,
                'identifier' => "Nome Cognome", //concatenati
                'details' => [
                    'firstname' => 'Nome',
                    'lastname' => 'Nome',
                    'codfiscale' => 'Nome',
                ]
            ],
            'beneficiario_2' => [
                'type_id' => 3,
                'identifier' => "Nome Cognome", //concatenati
                'details' => [
                    'firstname' => 'Nome',
                    'lastname' => 'Nome',
                    'codfiscale' => 'Nome',
                ]
            ],

        ];*/


        $result = [];

        // partendo dall'array con tutti i dati
        foreach ($rows as $key => $value) {
            Log::debug("***** read $key $value");
            $lastArrayRef = &$result;
            // esplodo la key con il .
            $exploded = explode(".", $key);
            $lastJsonKey = end($exploded);

            Log::debug("la chiave che ha il valore è {$lastJsonKey}");

            //insurancepolicy.capitale
            foreach ($exploded as $current) {

                Log::debug("current json key $current vs $lastJsonKey");
                Log::debug("current result:", [$result, $lastArrayRef]);
                Log::debug("current has key $current", [array_key_exists($current, $lastArrayRef)]);

                if ($current == $lastJsonKey) {
                    $lastArrayRef[$current] = $value;
                    Log::debug("aggiungo nuova chiave/valore", [$lastArrayRef, $result]);
                } else if (!array_key_exists($current, $lastArrayRef)) {
                    $lastArrayRef[$current] = [];
                    Log::debug("aggiungo nuova chiave/array", [$lastArrayRef, $result]);
                }

                $lastArrayRef = &$lastArrayRef[$current];
            }
        }

        //  dd($result,$this->computed());

        $newmap = $this->computed();


        foreach ($newmap as $key => $value) {


            if(preg_match_all('/{+(.*?)}/', $value, $matches)) {

               foreach($matches[1] as $val){


                   $namecamp = Arr::get($result, $val);

                   $strtoreplace[] = "{".$val."}";

                   $newstr[] = $namecamp;

               }
               
               $identifier = str_replace($strtoreplace, $newstr, $value);
            
                Arr::set($result, $key, $identifier);

                //$result[$group][$camp] = $identifier;

            }else {
                Arr::set($result, $key, $value);
                //$result[$group][$camp] = $value;
            }
        }
        dd($result);
        // iniziamo con le computed - policy_holder.identifier

        // A.  se il value contiene dei placeholder con {.*} - es {policy_holder.details.firstname} {policy_holder.details.lastname}
        // per ogni placeholder - {policy_holder.details.firstname}
        // prendo senza graffe - policy_holder.details.firstname
        // prendo il valore dall'array lavorato precedentemente

        // faccio il replace e ottengo "nome cognome"
        // setto il nuovo campo con Arr::set()

        // B. setto direttamente il valore - 'policy_holder.type_id' => 1,

    }




    protected function getIdentifier($firstname, $lastname)
    {
    }

    protected function getSubjectType()
    {
        // 1 o 3
    }
}
