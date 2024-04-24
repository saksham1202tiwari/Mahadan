<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Blog;
use App\Models\Donation;
use App\Models\Event;
use Dipesh79\LaravelEsewa\LaravelEsewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        $events = Event::approved()->search($request)->paginate(20);
        $blogs = Blog::approved()->orderBy('id', 'desc')->limit(6)->get();
        return view('frontend.pages.home', compact('events', 'blogs'));
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function events(Request $request)
    {
        $events = Event::approved()->search($request)->paginate(20);
        return view('frontend.pages.events', compact('events'));
    }
    public function event(Event $event)
    {
        return view('frontend.pages.event', compact('event'));
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::approved()->paginate(20);
        return view('frontend.pages.blogs', compact('blogs'));
    }
    public function blog(Blog $blog)
    {
        return view('frontend.pages.blog', compact('blog'));
    }

    public function donate(Event $event, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'payment_method' => 'required'
        ]);

        if (auth()->check()) {
            $donor_id = auth()->id();
        } else {
            $donor_id = null;
        }

        $data = [
            'event_id' => $event->id,
            'beneficiary_id' => $event->user_id,
            'donor_id' => $donor_id,
            'amount' =>  $request->amount,
            'name' => $request->name,
            'email' => $request->email,
            'payment_method' => $request->payment_method
        ];

        $donation = Donation::create($data);

        $payment = new LaravelEsewa;

        return redirect($payment->esewaCheckout($request->amount, 0, 0, 0, 'DON-' . $donation->id, route('frontend.esewa_success', $donation->id), route('frontend.esewa_failure', $donation->id)));
    }

    public function esewa_success(Donation $donation, Request $request)
    {
        $donation->update([
            'reference_no' => $request->refId,
        ]);
        $donation->event->amount_raised += $donation->amount;
        $donation->event->save();
        return redirect()->route('frontend.event', $donation->event_id)->with('success', 'You have donated Successfully');
    }
    public function esewa_failure(Donation $donation)
    {
        return redirect()->route('frontend.event', $donation->event_id)->with('danger', 'You Donation has been failed due to some reasons');
    }

    public function contactMail(Request $request)
    {
        $sanitized = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'subject' => ['required'],
            'message' => ['required']
        ]);

        Mail::to('admin@admin.com')->send(new ContactMail($sanitized));
        return redirect()->back()->with('success', 'Query sent successfully');
    }
}
