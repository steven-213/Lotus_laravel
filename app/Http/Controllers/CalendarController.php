<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        $events = [];
        $calendarios = Calendario::all();

        foreach ($calendarios as $calendario) {
            $color = null;
            if ($calendario->title == 'Test') $color = '#924ACE';
            if ($calendario->title == 'Test 1') $color = '#68B01A';

            $events[] = [
                'id'      => $calendario->id,
                'title'   => $calendario->title,
                'start'   => $calendario->start_date,
                'end'     => $calendario->end_date,
                'allDay'  => (bool) $calendario->all_day,
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

        $calendario = Calendario::create([
            'title'      => $request->title,
            'start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
            'end_date'   => Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),
            'all_day'    => $request->boolean('allDay'),
        ]);

        $color = null;
        if ($calendario->title == 'Test') $color = '#924ACE';
        if ($calendario->title == 'Test 1') $color = '#68B01A';

        return response()->json([
            'id'     => $calendario->id,
            'title'  => $calendario->title,
            'start'  => $calendario->start_date,
            'end'    => $calendario->end_date,
            'allDay' => (bool) $calendario->all_day,
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

        $event = Calendario::findOrFail($id);

        if ($request->title) {
            $event->title = $request->title;
        }

        $event->start_date = Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $event->end_date   = Carbon::parse($request->end_date ?? $request->start_date)->format('Y-m-d H:i:s');
        $event->all_day    = filter_var($request->allDay, FILTER_VALIDATE_BOOLEAN);
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
        $calendario = Calendario::find($id);
        if (!$calendario) {
            return response()->json(['error' => 'Unable to locate the event'], 404);
        }

        $calendario->delete();
        return response()->json(['success' => true, 'id' => $id]);
    }
}
