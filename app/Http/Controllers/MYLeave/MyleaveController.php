<?php

namespace App\Http\Controllers\MYLeave;

use App\Service\MyleaveService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MyleaveController extends Controller
{
    public function myleaveView()
    {
        $ms = new MyleaveService;

        $data['myleave'] = $ms->myleaveView();
        $data['myleaveHistory'] = $ms->myleaveHistoryView();
        $data['types'] = $ms->datatype();
        
        return view('pages.myleave.myleave',$data);
    }

     public function createtmyleave(Request $r)
    {
        
        $ms = new MyleaveService;

        $result = $ms->createtmyleave($r);

        return response()->json($result);
    }

    public function getcreatemyleave($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->getcreatemyleave($id);

        return $result;
    }

    public function deletemyleave($id)
    {
        $ms = new MyleaveService;

        $result = $ms->deletemyleave($id);

        return response()->json($result);
    }

    public function getusermyleave($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->getusermyleave($id);
        // dd($result);

        return $result;
    }
    public function getuserleaveAppr($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->getuserleaveAppr($id);
        // dd($result);

        return $result;
    }

    public function getuserleaveApprhod($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->getuserleaveApprhod($id);
        // dd($result);

        return $result;
    }


    //supervisor


     public function leaveApprView()
    {
         $ms = new MyleaveService;

        $data['leaveApprView'] = $ms->leaveApprview();
        // $data['myleaveHistory'] = $ms->myleaveHistoryView();
        // $data['types'] = $ms->datatype();
        // dd($data['leaveApprView']);
        return view('pages.myleave.leaveAppr',$data);
       
        
    }

    public function updatesupervisor(Request $r, $id)
    {
        $ms = new MyleaveService;

        $result = $ms->updatesupervisor($r, $id);

        return response()->json($result);
    }


    public function updatesupervisorreject(Request $r, $id)
    {
        $ms = new MyleaveService;

        $result = $ms->updatesupervisorreject($r, $id);

        return response()->json($result);
    }



    //hod
      public function leaveApprhodView()
    {
         $ms = new MyleaveService;

        $data['leaveApprhodView'] = $ms->leaveApprhodView();
        // $data['myleaveHistory'] = $ms->myleaveHistoryView();
        // $data['types'] = $ms->datatype();
        // dd($data['leaveApprView']);
        return view('pages.myleave.leaveApprhod',$data);
       
        
    }

     public function updatehod(Request $r, $id)
    {
        $ms = new MyleaveService;

        $result = $ms->updatehod($r, $id);

        return response()->json($result);
    }


    public function updatehodreject(Request $r, $id)
    {
        $ms = new MyleaveService;

        $result = $ms->updatehodreject($r, $id);

        return response()->json($result);
    }







    //  public function leaveApprhodView()
    // {
    //     // $ms = new MyleaveService;

    //     // $data['myleave'] = $ms->leaveApprView();
       
        
    //     return view('pages.myleave.leaveApprhod');
    // }


     public function approvemyleave($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->approvemyleave($id);

        return $result;
    }
     public function approvemyleaveby($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->approvemyleaveby($id);

        return $result;
    }


      

}
