<?php

namespace App\Http\Controllers\MYLeave;

use App\Service\MyleaveService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MyleaveController extends Controller
{
    public function myleaveView(Request $r)
    {
        $ms = new MyleaveService;

        $data['myleave'] = $ms->myleaveView();
        $data['myleaveHistory'] = $ms->myleaveHistoryView();
        $data['applydate'] = '';
        $data['typelist'] = '';
        $data['status_searching'] = '';
        $data['types'] = $ms->datatype();
        // $data['mypie'] = $ms->datapie();

        $input = $r->input();
        if($input){
            $data['myleaveHistory'] = $ms->searcmyleavehistory($r);
            $data['applydate'] = $input['applydate'];
            $data['typelist'] = $input['typelist'];
            $data['status_searching'] = $input['status'];

            // dd($data);
            // die;
        }
        
        
        return view('pages.myleave.myleave',$data);
    }

     public function searchmyleavehistory(Request $r)
    {
        // $ms = new MyleaveService;
        // $input = $r->input();
        // $data['myleave'] = $ms->myleaveView();
        // $data['types'] = $ms->datatype();
        // $data['myleaveHistory'] = $ms->searcmyleavehistory($r);
        // $data['applydate'] = $input['applydate'];
        // $data['typelist'] = $input['typelist'];
        // $data['status'] = $input['status'];


        // // dd($data);
        // // die;


        // return view('pages.myleave.myleave', $data);
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

    public function getpieleave()
    {
        $ms = new MyleaveService;

        $result = $ms->getpieleave();
        // dd($result);

        return $result;
    }
    public function getpieleave2()
    {
        $ms = new MyleaveService;

        $result = $ms->getpieleave2();
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
    public function getuserleaveApprview($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->getuserleaveApprview($id);
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
    public function getuserleaveApprhodview($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->getuserleaveApprhodview($id);
        // dd($result);

        return $result;
    }


    //supervisor


     public function leaveApprView(Request $r)
    {
        $ms = new MyleaveService;
        $data['leaveApprView'] = $ms->leaveApprview();
        $data['employer'] = $ms->idemployer();
        $data['types'] = $ms->datatype();
        $data['applydate'] = '';
        $data['idemployer'] = '';
        $data['type'] = '';

        $input = $r->input();

        if($input){
            $data['leaveApprView'] = $ms->searleavaappr($r);
            $data['applydate'] = $input['applydate'];
            $data['idemployer'] = $input['idemployer'];
            $data['type'] = $input['type'];
        }

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
      public function leaveApprhodView(Request $r)
    {
        $ms = new MyleaveService;
        $data['leaveApprhodView'] = $ms->leaveApprhodView();
        $data['employer'] = $ms->idemployerhod();
        $data['types'] = $ms->datatype();
        $data['applydate'] = '';
        $data['idemployer'] = '';
        $data['type'] = '';

        $input = $r->input();

        if($input){
            $data['leaveApprhodView'] = $ms->searApprhod($r);
            $data['applydate'] = $input['applydate'];
            $data['idemployer'] = $input['idemployer'];
            $data['type'] = $input['type'];
        }

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
