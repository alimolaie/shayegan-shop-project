<?php

namespace App\Http\Controllers;

use App\Intro;
use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Auth;
class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //Request $request
    {

        $settingInfo = Settings::where("keyname","setting")->first();
        $couponLists = Intro::paginate($settingInfo->item_per_page_back);
        return view('gwc.intro.index',['couponLists' => $couponLists]);
    }


    /**
    Display the color listings
     **/
    public function create()
    {


        return view('gwc.intro.create');
    }



    /**
    Store New color Details
     **/
    public function store(Request $request)
    {

        $settingInfo = Settings::where("keyname","setting")->first();


        //field validation
        $this->validate($request, [
            'title'     => 'required|min:3|max:190|string',
            'icon'     => 'required|min:3|max:190|string',
            'description'     => 'required|min:3|max:190|string',
        ]);


        try{





            $color = new Intro;
            //slug

            $color->title=$request->input('title');
            $color->icon	=$request->input('icon');
            $color->description=$request->input('description');
            $color->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
            $color->save();

            //save logs
            $key_name   = "intro";
            $key_id     = $color->id;
            $message    = "A new record for intro is added. (".$color->title.")";
            $created_by = Auth::guard('admin')->user()->id;
            Common::saveLogs($key_name,$key_id,$message,$created_by);
            //end save logs

            return redirect('/admin/intro')->with('message-success','A new record is added successfully');

        }catch (\Exception $e) {
            return redirect()->back()->with('message-error',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editcolor = Intro::find($id);
        return view('gwc.color.edit',compact('editcolor'));
    }


    /**
     * Show the details of the color.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $colorDetails = Intro::find($id);
        return view('gwc.color.view',compact('colorDetails'));
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
        $settingInfo = Settings::where("keyname","setting")->first();


        //field validation
        $this->validate($request, [
            'title'     => 'required|min:3|max:190|string',
            'icon'     => 'required|min:3|max:190|string',
            'description'     => 'required|min:3|max:190|string',
        ]);

        try{



            $color = Intro::find($id);


            $color->title=$request->input('title');
            $color->icon	=$request->input('icon	');
            $color->description=$request->input('description');
            $color->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
            $color->save();


            //save logs
            $key_name   = "intro";
            $key_id     = $color->id;
            $message    = "Record for intro is edited. (".$color->title.")";
            $created_by = Auth::guard('admin')->user()->id;
            Common::saveLogs($key_name,$key_id,$message,$created_by);
            //end save logs


            return redirect('/admin/intro')->with('message-success','Information is updated successfully');

        }catch (\Exception $e) {
            return redirect()->back()->with('message-error',$e->getMessage());
        }
    }

    /**
     * Delete the Image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Delete color along with childs via ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //check param ID
        if(empty($id)){
            return redirect('/admin/intro')->with('message-error','Param ID is missing');
        }
        //get cat info
        $color = Intro::find($id);
        //check cat id exist or not
        if(empty($color->id)){
            return redirect('/admin/intro')->with('message-error','No record found');
        }

        //delete parent cat mage

        //save logs
        $key_name   = "intro";
        $key_id     = $color->id;
        $message    = "A record is removed. (".$color->title.")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name,$key_id,$message,$created_by);
        //end save logs


        //end deleting parent cat image
        $color->delete();
        return redirect()->back()->with('message-success','color is deleted successfully');
    }



    //download pdf


    //update status
    public function updateStatusAjax(Request $request)
    {
        $recDetails = Intro::where('id',$request->id)->first();
        if($recDetails['is_active']==1){
            $active=0;
        }else{
            $active=1;
        }

        //save logs
        $key_name   = "intro";
        $key_id     = $recDetails->id;
        $message    = "intro status is changed to ".$active." (".$recDetails->title.")";
        $created_by = Auth::guard('admin')->user()->id;
        Common::saveLogs($key_name,$key_id,$message,$created_by);
        //end save logs


        $recDetails->is_active=$active;
        $recDetails->save();
        return ['status'=>200,'message'=>'Status is modified successfully'];
    }
}
