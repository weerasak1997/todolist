<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insertevent;

class InsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Insertevent::all()->toArray();
        
        // echo "dsdddsds";
        
        // return view('todolist',compact('events'));
        return view('todolist');
        
    }
    public function showtable(){
        $events = Insertevent::all()->toArray();
        $arrayint=array();
        foreach($events as $result) {
            array_push($arrayint,$result['completed']);
        }
        // echo $events;
        // echo $events['completed'];
        return view('todolist',compact('events'),compact('arrayint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'event' => 'required',
            // 'completed' => 'required'
        ]);
        $insertevent = new Insertevent([
            // 'event' => $request->get('event'),
            'event' => $request->get('event'),
            'completed' => 0
        ]);
        $insertevent->save();
        return redirect()->route('todolist')->with('success','Add todolist success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }
    public function updateevent($id,$checkStatus)
    {
        $status = true;
        $text = 'event completed';
        $type = 'error';
        if($checkStatus == 1){
            $text = 'event is not finist yet';
            $type = 'danger';
            $status = false;
        }
        if($checkStatus == 0){
            $text = 'event completed';
            $type = 'success';
            $status = true;
        }
        
        $events = Insertevent::find($id);
        $events->completed = $status;
        $events->save();
        return redirect()->route('todolist')->with($type,$text);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $event = Insertevent::find($id);
        $event->delete();
        return redirect()->route('todolist')->with('success', 'Delete event complete');
    }
}
