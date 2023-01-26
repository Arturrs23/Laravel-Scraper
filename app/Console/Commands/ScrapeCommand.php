<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\data;


$client = new Client();

class ScrapeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    // command to start the scrape from console
    protected $signature = 'scrape:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // request from the website for the first page
        $client = new Client();
        $crawler = $client->request('GET', 'https://news.ycombinator.com/');
        $titles = $crawler->filter('.titleline > a');
        $points = $crawler->filter('.subline .score');
        $dates = $crawler->filter('.subline .age');
        // filter the .titleline > a to get the title, link, & filter the .subline .score to get the points, & filter the .subline .age to get the date created.
        //  loop through the elements of all filters with eq() method  * eq() method returns an element with a specific index number of the selected elements. The index numbers start at 0 *
        //  eq() method throws an InvalidArgumentException if the index is out of range of the element list
       // The min() function is used to find the lowest value in an array
        $count = min($titles->count(), $points->count(), $dates->count());

        for ($i = 0; $i < $count; $i++) {
            $title = $titles->eq($i);
            $point = $points->eq($i);
            $date = $dates->eq($i);
            print "Title: ".$title->text()."\n";
            print "Link: ".$title->attr('href')."\n";
            print "Points: ".$point->text()."\n";
            print "Date created: ".$date->text()."\n";


            // insert in to DB using data module
            $data = new data();
            $data->title = $title->text();
            $data->link = $title->attr('href');
            $data->points = $point->text();
            $data->date_created = $date->text();
            $data->save();
         
        }
            
        return Command::SUCCESS;

   
    }
}