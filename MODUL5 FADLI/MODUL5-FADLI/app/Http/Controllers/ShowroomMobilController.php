<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class ShowroomMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // buat menampilkan data dari showroom 
        $showroom = Showroom::where('user_id', auth()->user()->id)->get();
        $showroom_count = Showroom::where('user_id', auth()->user()->id)->get()->count();
        if($showroom_count == 0 ){
            return redirect('/add');
        }
        $setWarna = Cookie::get('warnaNavbar') ?? 'primary';
        
        return view('showroom', [
            'title' => 'showroom',
            'showroom' => $showroom,
            'countShowroom'=>$showroom_count,
            'setWarna' =>$setWarna
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setWarna = Cookie::get('warnaNavbar') ?? 'primary';

        return view('add', [
            "title" => "add",
            'setWarna' => $setWarna
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
        $request->image->storeAs('image/', $imgName);

        Showroom::create(
            [   
                'user_id' => auth()->user()->id,
                'name'=> $request->name,
                'owner'=> $request->owner,
                'brand'=> $request->brand,
                'description'=> $request->description,
                'created_at'=> $request->created_at,
                'image'=> $imgName,
                'status'=> $request->status
            ]
            );
            $request->session()->flash('successData', 'Data berhasil ditambahkan');

            return redirect('/showroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function show(Showroom $showroom)
    {
        $setWarna = Cookie::get('warnaNavbar') ?? 'primary';

        return view('detail', [
            'showroom' => $showroom,
            'setWarna' => $setWarna
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Showroom $showroom)
    {
        $setWarna = Cookie::get('warnaNavbar') ?? 'primary';
        
        return view('edit', [
            'showroom' => $showroom,
            'setWarna' => $setWarna
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showroom $showroom)
    {
        

        if($request->file('image')){
            $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
            $request->image->storeAs('image/', $imgName);
            Showroom::where('id', $showroom->id)->update(
                [   
                    'name'=> $request->name,
                    'owner'=> $request->owner,
                    'brand'=> $request->brand,
                    'description'=> $request->description,
                    'created_at'=> $request->created_at,
                    'image'=> $imgName,
                    'status'=> $request->status
                ]
                );
                $request->session()->flash('successData', 'Data berhasil ditambahkan');
    
                return redirect('/showroom');
        }else {
            Showroom::where('id', $showroom->id)->update(
                [   
                    'name'=> $request->name,
                    'owner'=> $request->owner,
                    'brand'=> $request->brand,
                    'description'=> $request->description,
                    'created_at'=> $request->created_at,
                    'status'=> $request->status
                ]
                );
                $request->session()->flash('successData', 'Data berhasil ditambahkan');
    
                return redirect('/showroom');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showroom  $showroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showroom $showroom)
    {
        Showroom::where('id', $showroom->id)->delete();
        
        return redirect('/showroom');
    }
}