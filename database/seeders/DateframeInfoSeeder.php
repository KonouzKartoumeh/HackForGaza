<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DateframeInfo;

class DateframeInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DateframeInfo::create([
            'year' => 1935,
            'content' => 'The Arab Revolt begins opposing Jewish immigration',
            'summary' => 'Palestinian Arabs rebelled against British Mandate rule and Jewish immigration, seeking self-determination and an end to Jewish land purchases. British authorities imposed martial law to quell the unrest.'
        ]);

        DateframeInfo::create([
            'year' => 1937,
            'content' => 'The 1937 Peel Commission report proposes the two-state solution for the first time',
            'summary' => 'The Peel Commission suggested dividing Palestine into separate Jewish and Arab states, with an international enclave in Jerusalem, pioneering the two-state solution idea. Though not implemented, it set the stage for later developments.'
        ]);

        DateframeInfo::create([
            'year' => 1939,
            'content' => 'The 1939 British White Paper limits Jewish immigration',
            'summary' => 'Responding to the Arab Revolt, the 1939 White Paper limited Jewish immigration and land acquisitions, aligning with Arab demands and altering the conflict\'s course significantly.'
        ]);

        DateframeInfo::create([
            'year' => 1947,
            'content' => 'UN Passes Resolution 181 recommending partition of Palestine',
            'summary' => 'The UN passed Resolution 181 on November 29, 1947, suggesting the partition of Palestine into Jewish and Arab states with Jerusalem under UN administration. Jewish leaders accepted it, but Arab leaders rejected it.'
        ]);

        DateframeInfo::create([
            'year' => 1948,
            'content' => 'Declaration of the State of Israel',
            'summary' => 'On May 14, 1948, David Ben-Gurion, the head of the Jewish Agency, declared the establishment of the State of Israel in Tel Aviv. The declaration came one day before the expiration of the British Mandate in Palestine. This event marked the birth of the modern State of Israel.'
        ]);

        DateframeInfo::create([
            'year' => 1949,
            'content' => "Israel's declaration led to the first Arab-Israeli war",
            'summary' => 'Arab states, including Egypt, Jordan, Syria, and Iraq, intervened militarily in support of the Palestinian Arabs, aiming to prevent the establishment of Israel. An armistice in 1949 resulted in Israel\'s independence and territorial division.'
        ]);

    }
}
