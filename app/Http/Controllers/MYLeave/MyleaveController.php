<?php

namespace App\Http\Controllers\MYLeave;

use App\Service\MyleaveService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MyleaveController extends Controller
{
    public function myleaveView(Request $r){

        $ms = new MyleaveService;

        $data['myleave'] = $ms->myleaveView();
        $data['myleaveHistory'] = $ms->myleaveHistoryView();

        $data['applydate'] = '';
        $data['typelist'] = '';
        $data['status_searching'] = '';

        $data['applydatemy'] = '';
        $data['typelistmy'] = '';
        $data['status_searchingmy'] = '';
        $data['types'] = $ms->datatype();
        $data['typessick'] = $ms->datatypesick();

        // dd($data['typessick']);
        // die;
        // $data['mypie'] = $ms->datapie();

        $input = $r->input();
        // dd($input);
        // die;
        if (isset($input['applydatemy']) || isset($input['typelistmy']) || isset($input['statusmy'])) {
            $data['myleave'] = $ms->searchmyleaveView($r);
            $data['applydatemy'] = isset($input['applydatemy']) ? $input['applydatemy'] : '';
            $data['typelistmy'] = isset($input['typelistmy']) ? $input['typelistmy'] : '';
            $data['status_searchingmy'] = isset($input['statusmy']) ? $input['statusmy'] : '';
        }

        if (isset($input['applydate']) || isset($input['typelist']) || isset($input['status'])) {
            $data['myleaveHistory'] = $ms->searcmyleavehistory($r);
            $data['applydate'] = isset($input['applydate']) ? $input['applydate'] : '';
            $data['typelist'] = isset($input['typelist']) ? $input['typelist'] : '';
            $data['status_searching'] = isset($input['status']) ? $input['status'] : '';
        }



        return view('pages.leave.myleave', $data);
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
        // $input = $r->input();
        // dd($input);
        // die;

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

    public function getEarnedLeave()
    {
        $ms = new MyleaveService;
        $result = $ms->getEarnedLeave();
        return $result;
    }

    public function getLapseLeave()
    {
        $ms = new MyleaveService;
        $result = $ms->getLapseLeave();
        return $result;
    }

    public function totalNoPaidLeave()
    {
        $ms = new MyleaveService;
        $result = $ms->totalNoPaidLeave();
        return $result;
    }



    public function getuserleaveApprhod($id = '')
    {
        $ms = new MyleaveService;

        $result = $ms->getuserleaveApprhod($id);
        // dd($result);

        return $result;
    }

    public function getuserleaveApprhodview($id = '') {
        $ms = new MyleaveService;

        $result = $ms->getuserleaveApprhodview($id);
        // dd($result);

        return $result;
    }

    public function checkLeaveEntitlement()
    {
        $ms = new MyleaveService;
        $result = $ms->checkLeaveEntitlement();
        return $result;
    }




    //supervisor


    public function leaveRecommenderIndex(Request $r)
    {
        $ms = new MyleaveService;
        $data['leaveRecommenderListActive'] = $ms->leaveRecommenderActive();
        $data['leaveRecommenderListHistory'] = $ms->leaveRecommenderHistory();
        $data['employer'] = $ms->idemployer();
        $data['types'] = $ms->datatype();
        $data['applydate'] = '';
        $data['idemployer'] = '';
        $data['type'] = '';
        $data['applydateH'] = '';
        $data['idemployerH'] = '';
        $data['typeH'] = '';

        $input = $r->input();

        if (isset($input['applydate']) || isset($input['idemployer']) || isset($input['type'])) {
            $data['leaveRecommenderListActive'] = $ms->searchleaveRecommenderActive($r);
            $data['applydate'] = isset($input['applydate']) ? $input['applydate'] : '';
            $data['idemployer'] = isset($input['idemployer']) ? $input['idemployer'] : '';
            $data['type'] = isset($input['type']) ? $input['type'] : '';
        }

        if (isset($input['applydateH']) || isset($input['idemployerH']) || isset($input['typeH'])) {
            $data['leaveRecommenderListHistory'] = $ms->activeleaveRecomenderHistory($r);
            $data['applydateH'] = isset($input['applydateH']) ? $input['applydateH'] : '';
            $data['idemployerH'] = isset($input['idemployerH']) ? $input['idemployerH'] : '';
            $data['typeH'] = isset($input['typeH']) ? $input['typeH'] : '';
        }

        return view('pages.leave.leaveRecommender', $data);
    }

    public function updateRecommender(Request $r, $id) {

        $ms = new MyleaveService;
        $result = $ms->updateRecommender($r, $id);

        return response()->json($result);
    }


    public function updateRecommenderReject(Request $r, $id)
    {
        $ms = new MyleaveService;

        $result = $ms->updateRecommenderReject($r, $id);

        return response()->json($result);
    }

    public function getuserRecommender($id = '') {

        $ms = new MyleaveService;
        $result = $ms->getuserRecommender($id);

        return $result;
    }

    public function getuserRecommenderView($id = '') {

        $ms = new MyleaveService;
        $result = $ms->getuserRecommenderView($id);

        return $result;
    }







    //hod
    public function leaveApproverIndex(Request $r)
    {
        $ms = new MyleaveService;
        $data['leaveApproverListActive'] = $ms->leaveApproverActive();
        $data['leaveApproverListHistory'] = $ms->leaveApproverHistory();
        $data['employer'] = $ms->idemployerhod();
        $data['types'] = $ms->datatype();
        $data['applydate'] = '';
        $data['idemployer'] = '';
        $data['type'] = '';
        $data['applydateH'] = '';
        $data['idemployerH'] = '';
        $data['typeH'] = '';

        $input = $r->input();

        if (isset($input['applydate']) || isset($input['idemployer']) || isset($input['type'])) {
            $data['leaveApproverListActive'] = $ms->searchleaveApproverActive($r);
            $data['applydate'] = isset($input['applydate']) ? $input['applydate'] : '';
            $data['idemployer'] = isset($input['idemployer']) ? $input['idemployer'] : '';
            $data['type'] = isset($input['type']) ? $input['type'] : '';
        }

        if (isset($input['applydateH']) || isset($input['idemployerH']) || isset($input['typeH'])) {
            $data['leaveApproverListHistory'] = $ms->activeleaveApproverHistory($r);
            $data['applydateH'] = isset($input['applydateH']) ? $input['applydateH'] : '';
            $data['idemployerH'] = isset($input['idemployerH']) ? $input['idemployerH'] : '';
            $data['typeH'] = isset($input['typeH']) ? $input['typeH'] : '';
        }



        return view('pages.leave.leaveApprover', $data);
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



    //get checking holiday

    public function myholiday($date = '')
    {
        $gclh = new MyleaveService;

        $result = $gclh->myholiday($date);


        return response()->json($result);
    }

    public function checkTSRLeave($date = '')
    {
        $gclh = new MyleaveService;

        $result = $gclh->checkTSRLeave($date);

        return response()->json($result);
    }
    public function checkTSRLeaveSecond($date = '')
    {
        $gclh = new MyleaveService;

        $result = $gclh->checkTSRLeaveSecond($date);

        return response()->json($result);
    }
}
