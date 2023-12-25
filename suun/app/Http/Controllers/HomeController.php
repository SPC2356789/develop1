<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Post;
use App\Models\SetTime;
use App\Models\Holiday;
use App\Models\Headnote;
use App\Models\Visit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = ['ip' => $request->ip(),];
        Visit::create($data);
        $note = Headnote::pluck('note')->toArray();
        $time_range = SetTime::selectRaw('*, CONCAT(start_time, "-", end_time) AS time')->get()->toArray();
//        $Holiday = Holiday::selectRaw('*, JSON_UNQUOTE(time_point) AS time_ranges')->get()->toArray();
        $count_time = count($time_range);
        $Reserve = Calendar::pluck('date')->toArray();
        $holidayNames = Holiday::pluck('time_point', 'date')
            ->toArray();
//        $holiday = Holiday::pluck('date')->toArray();
//        $holiday = array_keys($holidayNames);
        $holidayArray = array_map(function ($string) {
            // 去除首尾的双引号，然后以逗号分隔成数组
            return explode(',', trim($string, ''));
        }, $holidayNames);


        $Calendar_Reserve = Calendar::selectRaw('*, REPLACE(CONCAT(REPLACE(date, "-", ""),REPLACE(time, ":", "")), "-", "") AS did')
//            ->whereNotIn('date', $holiday)
            ->get()
            ->toArray();
        $ptime = $this->reKey($time_range, 'id');

        $pPost = $this->reKey(
            Post::selectRaw('*')
                ->where('status', 1)
                ->get()
                ->toArray(),
            'id'
        );
        $HA = array();
        foreach ($holidayArray as $date => $timeRanges) {
//            \gl::debug($timeRanges);
            if (count($timeRanges) !== $count_time) {
                foreach ($timeRanges as $tk => $t) {
                    $did = str_replace(['-', ':'], '', $date . $t);
                    $HA[] = ['text' => ' ', 'bcolor' => '#777888', 'tcolor' => '#ffffff', 'did' => $did];
                }
            } else if (!in_array($date, $Reserve)) {
                $holidayAry[$date] = $timeRanges;
            }
        }
//        \gl::debug($holidayAry);
        $pReserve_mag = array_merge($Calendar_Reserve, $HA);
        $pReserve = $this->reKey($pReserve_mag, 'did');
//        \gl::debug($pReserve);
//        \gl::debug($note);
//        \gl::debug($Reserve);

        return view('font.Home', compact('pReserve', 'ptime', 'pPost', 'holidayAry', 'count_time', 'note'));

    }

}
