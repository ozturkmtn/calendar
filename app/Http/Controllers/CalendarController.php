<?php

namespace App\Http\Controllers;

use App\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        echo 'Calendar Controller Index Page';
//        die;

        if (!empty($request->input())) {
            $input = $request->input();

            $event = new CalendarEvent();
            $event->title = $input['title'];
            $event->description = $input['description'];
            $event->calendar_type = $input['calendar_type'];
            if ($input['calendar_type'] == 'event') {
                $eventTime = $input['timepicker'] .':00';
                $inputDate = date_create_from_format('d/m/Y H:i:s', $input['event_date'] .' '. $eventTime );
            } else {
                $inputDate = date_create_from_format('d/m', $input['anniversary_date']);
                $inputDate->setTime('00','00');
                $event->all_day = true;
            }
            $event->start =  $inputDate;
            $event->end = $inputDate;
            $event->all_day = false;

            if (!empty($request->file('event_image'))) {
                $date = new \DateTime();
                $fileName = $date->getTimestamp() .'_'. rand();
                $fileExtention = $request->file('event_image')->extension();
                $fullFileName = $fileName.'.'.$fileExtention;
                $request->file('event_image')->storeAs('public/event_images', $fullFileName);
                $event->file_name = '/storage/event_images/'. $fullFileName;
            }
            $event->save();
            return redirect('/calendar');
        }

        $events = [];
        $calendarEvents = DB::table('calendar_event')->get();
        $calendarEventArray = [];
        foreach ($calendarEvents as $calendarEvent) {
            if ($calendarEvent->calendar_type == 'anniversary'){
                $year = new \DateTime();
                $cutDate = substr($calendarEvent->start, 4);

                $thisYear = $year->format('Y');
                $calendarEvent->start = $thisYear.$cutDate;
                $calendarEvent->end = $thisYear.$cutDate;
                $calendarEventArray[] = (array) $calendarEvent;

                $lastYear = $year->modify('-1 year')->format('Y');
                $calendarEvent->start = $lastYear.$cutDate;
                $calendarEvent->end = $lastYear.$cutDate;
                $calendarEventArray[] = (array) $calendarEvent;

                $nextYear = $year->modify('+2 year')->format('Y');
                $calendarEvent->start = $nextYear.$cutDate;
                $calendarEvent->end = $nextYear.$cutDate;
                $calendarEventArray[] = (array) $calendarEvent;

            } else {
                $calendarEventArray[] = (array) $calendarEvent;
            }
        }

//        dump($calendarEventArray);die;

        return view('calendar/index', ['calendarEvents' => $calendarEventArray]);
    }

}
