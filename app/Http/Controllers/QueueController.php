<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queue  = Queue::where('status','waiting')->first();
        $queues = Queue::where('status','waiting')
            // ->where('id','!=',$queue->id)
            ->get();

        $mytime = Carbon::now();
        $start = $mytime->toTimeString();

        if($queue){
            $queue->update([
                'user_id' => Auth::id(),
                'start'       => $start,
                'end'         => now()->format('H:i:s'),
                'status' => 'end'
            ]);

            return view('show',compact('queue','queues'));
        }else{
            $msg = "Not found new Ticket";
            return view('welcome',compact('msg'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required'
        ]);

        // to get year by carbon
        $now = Carbon::now();
        $number = Queue::whereYear('created_at','=',$now->year)->max('number');
        $counter = $number ? $number + 1 : $now->year .'0001';

        $queue = Queue::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'number' => $counter
        ]);

        session()->flash('success','Ticket created successfully');//message

        session()->put('number',$counter);

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function close(Queue $queue)
    {
        session()->forget('number');
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queue $queue)
    {
        //
    }
}
