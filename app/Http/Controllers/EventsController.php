<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use App\Models\User;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EventRequest $request)
    {
        $event = new Event;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->target_amount = $request->input('target_amount');
        $event->amount_raised = $request->input('amount_raised');
        $event->category_id = $request->input('category_id');

        if (auth()->user()->user_type == 2) {
            $event->user_id = auth()->id();
        } else {

            $event->user_id = $request->input('user_id');
        }

        if (auth()->user()->user_type == 1) {
            $event->approved = 1;
        }
        $event->save();

        if ($request->has('image') && $request->image !== null) {
            $event->addMedia($request->image)->toMediaCollection();
        }

        return to_route('user.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->target_amount = $request->input('target_amount');
        $event->amount_raised = $request->input('amount_raised');
        $event->category_id = $request->input('category_id');

        if (auth()->user()->user_type == 2) {
            $event->user_id = auth()->id();
        } else {
            $event->user_id = $request->input('user_id');
        }
        if (auth()->user()->user_type == 1) {
            $event->approved = 1;
        }
        $event->save();
        if ($request->has('image') && $request->image !== null) {
            $event->clearMediaCollection();
            $event->addMedia($request->image)->toMediaCollection();
        }

        return to_route('user.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return to_route('user.events.index');
    }
}
