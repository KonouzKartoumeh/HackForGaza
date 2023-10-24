<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventInfo;

class EventInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventInfo::create([
            'date' => '1936-04-19',
            'title' => 'The Arab Revolt begins opposing Jewish immigration',
            'description' => 'Palestinian Arabs rebelled against British Mandate rule and Jewish immigration, seeking self-determination and an end to Jewish land purchases. British authorities imposed martial law to quell the unrest.'
        ]);
        
        EventInfo::create([
            'date' => '1937-07-07',
            'title' => 'The 1937 Peel Commission report proposes the two-state solution for the first time',
            'description' => 'The Peel Commission suggested dividing Palestine into separate Jewish and Arab states, with an international enclave in Jerusalem, pioneering the two-state solution idea. Though not implemented, it set the stage for later developments.'
        ]);
        
        EventInfo::create([
            'date' => '1939-05-17',
            'title' => 'The 1939 British White Paper limits Jewish immigration',
            'description' => 'Responding to the Arab Revolt, the 1939 White Paper limited Jewish immigration and land acquisitions, aligning with Arab demands and altering the conflict\'s course significantly.'
        ]);
        
        EventInfo::create([
            'date' => '1947-11-29',
            'title' => 'UN Passes Resolution 181 recommending partition of Palestine',
            'description' => 'The UN passed Resolution 181 on November 29, 1947, suggesting the partition of Palestine into Jewish and Arab states with Jerusalem under UN administration. Jewish leaders accepted it, but Arab leaders rejected it.'
        ]);
        
        EventInfo::create([
            'date' => '1948-05-14',
            'title' => 'Declaration of the State of Israel',
            'description' => 'On May 14, 1948, David Ben-Gurion, the head of the Jewish Agency, declared the establishment of the State of Israel in Tel Aviv. The declaration came one day before the expiration of the British Mandate in Palestine. This event marked the birth of the modern State of Israel.'
        ]);
        
        EventInfo::create([
            'date' => '1948-05-14',
            'title' => "Israel's declaration led to the first Arab-Israeli war",
            'description' => 'Arab states, including Egypt, Jordan, Syria, and Iraq, intervened militarily in support of the Palestinian Arabs, aiming to prevent the establishment of Israel. An armistice in 1949 resulted in Israel\'s independence and territorial division.'
        ]);
        

    }
}
