<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class EventCalendarController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Calendar::whereDate('event_start', '>=', $request->start)
                ->whereDate('event_end',   '<=', $request->end)
                ->get(['id', 'event_name', 'event_start', 'event_end']);
            return response()->json($data);
        }
        return view('eventcalendar');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createEvent(Request $request)
    {
        $event = Calendar::create([
            'event_name' => $request->event_name,
            'event_start' => $request->event_start,
            'event_end' => $request->event_end,
        ]);
        return response()->json($event);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function deleteEvent(Request $request)
    {
        $event = Calendar::find($request->id)->delete();

        return response()->json($event);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function editEvent(Request $request)
    {
        $event = Calendar::find($request->id)->update([
            'event_name' => $request->event_name,
            'event_start' => $request->event_start,
            'event_end' => $request->event_end,
        ]);

        return response()->json($event);
    }

}
