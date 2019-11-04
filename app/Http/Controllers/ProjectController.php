<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectPhoto;
use Carbon\Carbon;



class ProjectController extends Controller
{


    //index method
     public function index()
     {
         
        $allstudents = Project::all();
         return view('project.index',compact('allstudents'));
     } 

     //create method 
     public function create()
     {

         return view('project.create');
     }

     //view method 
     public function view($id)
     {

        $student = Project::find($id);
        $studentimages = ProjectPhoto::where('project_id',$id)->get();
        return view('project.view',compact('student','studentimages'));
        
     }
     
     //edit method
     public function edit($id)
     {
         $student = Project::find($id);
         return view('project.edit',compact('student'));
     }

     //store method 
     public function store(Request $request)
     {

           $this->validate($request,[
               'name' => 'required',
               'email' => 'required | unique:projects,email',
               'phone' => 'required | unique:projects,phone',
               // 'photos' => 'required | mimes:jpeg,jpg,bmp,png',
               'photos' => 'required',
               
          
           ]);

 
               
              // $project = Project::create($request->all());
               $project = new Project();
               $project->name = $request->name;
               $project->email = $request->email;
               $project->phone = $request->phone;
               $project->save();


          foreach ($request->photos as $photo)
          {

  
              $currentDate = Carbon::now()->toDateString();
              $filename = $currentDate.'-'. uniqid() .'.'. $photo->getClientOriginalExtension();
  
             if (!file_exists('uploads/photo'))
              {
                  mkdir('uploads/photo',0777,true);
              }
              $photo->move('uploads/photo',$filename);
  
              $ProjectPhoto = new ProjectPhoto;
              $ProjectPhoto->project_id = $project->id;
              $ProjectPhoto->filename   = $filename;
              $ProjectPhoto->save();
          }
  
          return redirect()->route('project.index')->with('success','Student Created successfully');
     }

     //update method
     public function update(Request $request,$id)
     {




        $this->validate($request,[

            'name' => 'required',
            'email' => 'required | unique:projects,email,'.$id,
            'phone' => 'required | unique:projects,phone,'.$id,

        
        ]);
       
        $project = Project::find($id);

        $ProjectPhoto = ProjectPhoto::where('project_id',$id)->get();


        $input = $request->all();

 

    if(isset($request->photos)){


        foreach ($ProjectPhoto as $projectphoto) {
        	 
            $projectphoto->delete();
            unlink('uploads/photo/'.$projectphoto->filename);
       }

        foreach ($request->photos as $photo) {

           

            $currentDate = Carbon::now()->toDateString();
            $filename = $currentDate.'-'. uniqid() .'.'. $photo->getClientOriginalExtension();



            if (!file_exists('uploads/photo'))
            {
                mkdir('uploads/photo',0777,true);
            }

            $photo->move('uploads/photo',$filename);

            $ProjectPhoto = new ProjectPhoto;
            $ProjectPhoto->project_id = $project->id;
            $ProjectPhoto->filename   = $filename;
            $ProjectPhoto->save();

        }

    }    


        $project->update($input);
        return redirect()->route('project.index')->with('success','Student data updated successfully');
     }

     //delete method
     public function destroy($id)
     {

        $project = Project::find($id);

        $ProjectPhoto = ProjectPhoto::where('project_id',$id)->get();


        foreach ($ProjectPhoto as $projectphoto) {
        	 

        	 $projectphoto->delete();
        	 unlink('uploads/photo/'.$projectphoto->filename);
        }

        $project->delete();
        return redirect()->route('project.index')->with('success','Student data deleted successfully');
     }
     


     


     

}//end class
