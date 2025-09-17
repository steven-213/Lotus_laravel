<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        $events = [];
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            $color = null;
            if ($booking->title == 'Test') $color = '#924ACE';
            if ($booking->title == 'Test 1') $color = '#68B01A';

            $events[] = [
                'id'      => $booking->id,
                'title'   => $booking->title,
                'start'   => $booking->start_date,
                'end'     => $booking->end_date,
                'allDay'  => (bool) $booking->all_day,
                'color'   => $color ?: '#3788d8'
            ];
        }

        return view('calendar.index', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string',
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
            'allDay'     => 'nullable|boolean',
        ]);

        $booking = Booking::create([
            'title'     => $request->title,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
            'end_date'  => Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),
            'all_day'   => $request->boolean('allDay'),
        ]);

        $color = null;
        if ($booking->title == 'Test') $color = '#924ACE';
        if ($booking->title == 'Test 1') $color = '#68B01A';

        return response()->json([
            'id'     => $booking->id,
            'title'  => $booking->title,
            'start'  => $booking->start_date,
            'end'    => $booking->end_date,
            'allDay' => (bool) $booking->all_day,
            'color'  => $color ?: '#3788d8',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'nullable|string',
            'start_date' => 'required|date',
            'end_date'   => 'nullable|date',
            'allDay'     => 'nullable',
        ]);

        $event = Booking::findOrFail($id);
        if ($request->title) $event->title = $request->title;

        $event->start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $event->end_date   = Carbon::parse($request->end_date ?? $request->start_date)->format('Y-m-d H:i:s');

        $event->all_day = filter_var($request->allDay, FILTER_VALIDATE_BOOLEAN);
        $event->save();

        return response()->json([
            'id'     => $event->id,
            'title'  => $event->title,
            'start'  => $event->start_date,
            'end'    => $event->end_date,
            'allDay' => (bool) $event->all_day,
        ]);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['error' => 'Unable to locate the event'], 404);
        }

        $booking->delete();
        return response()->json(['success' => true, 'id' => $id]);
    }
}
