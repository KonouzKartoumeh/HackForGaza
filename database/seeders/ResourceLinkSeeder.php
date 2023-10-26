<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResourceLink;

class ResourceLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
           
            [
                'url' => 'https://www.facebook.com/watch/?v=24727132033552820',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=A1LLBGTon6I',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            // Add more links here
            [
                'url' => 'https://www.facebook.com/watch/?v=792878686182330&extid=CL-UNK-UNK-UNK-AN_GK0T-GK1C&ref=sharing&mibextid=poYJrl',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=5Jam3vu3D4M',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=EUsbi5XNvoM',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=zqxe0VkmOJw',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=lF1ALH-bkHM',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=II9naIN71GQ',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
        
       
            
        
            
         
            [
                'url' => 'https://www.instagram.com/reel/CyvUz4DB7F9/?igshid=MzRlODBiNWFlZA%3D%3D&fbclid=IwAR3Txh9h-7WkFN35mPcBmXkUwrn89I8IcewA5NuunkOjgwGpC2FPvEkDy3w',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
        
       
            [
                'url' => 'https://www.youtube.com/watch?v=gas73_-SCIs',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
          
           
            [
                'url' => 'https://www.youtube.com/watch?v=pvD-Jodpb8E',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            // Add more links as needed
            
            [
                'url' => 'https://www.youtube.com/watch?v=5Jam3vu3D4M',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=EUsbi5XNvoM',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=zqxe0VkmOJw',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=lF1ALH-bkHM',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=II9naIN71GQ',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.tiktok.com/@ahmadragheb3/video/7290937733130898690',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.facebook.com/reel/836920398209925',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.facebook.com/permalink.php?story_fbid=pfbid0fCa4KmVs6x439LZaVVBhhSVcpnnF5BQSqSVp39cEmnCQaKF8TvVr8mUGWvHMiJFQl&id=100001835419574',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.facebook.com/majer.ma.3/posts/pfbid02iyki9JMNuecoWuyY4Bg3bCLkdisnJ8tESi2cxVDupdZddyjwQh9aJbxcF4KsjrhWl',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.instagram.com/reel/CyIuYdEL_Uy/?igshid=MzRlODBiNWFlZA%3D%3D&fbclid=IwAR1_YvP9jFTiRlGYJvpNy2rr8xAy7jZ7S9-xacMpNoTkHkEM5KfMAmaJpfo',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
            [
                'url' => 'https://www.instagram.com/reel/CyjhFVDKsmz/?igshid=MzRlODBiNWFlZA%3D%3D&fbclid=IwAR02Gzv2suFnaYAdpOmx_pV6R23E-0vnh3SO_UBAd2-fWnB5kJOp_U6oVWE',
                'event_info_id' => 1,
                'data_type_id' => 3,
            ],
        ];

        foreach ($links as $link) {
            ResourceLink::create($link);
        }
    }
}
