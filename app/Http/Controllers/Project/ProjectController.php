<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use App\Service\EmployeeService;
use App\Service\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function projectInfoView()
    {
        $data = [];

        $ps = new ProjectService;

        $data['projectInfos'] = $ps->projectInfoView();
        $data['projectApproval'] = $ps->projectApprovalData();
        $data['projectManager'] = $ps->checkIfUserProjectManager();
        $data['role_permission'] = getPermissionCodeArray();

        return view('pages.project.projectInfo', $data);
    }

    public function getProjectById($id = '')
    {
        $data = [];

        $ps = new ProjectService;

        $data = $ps->projectApprovalData($id);

        if ($data) {
            $data = $data[0];
        }

        return response()->json($data);
    }

    public function createProject(Request $r)
    {
        $ps = new ProjectService;

        $result = $ps->createProject($r);

        return response()->json($result);
    }

    public function projectInfoEditView($id = '')
    {
        $data = [];

        $es = new EmployeeService;
        $ps = new ProjectService;

        $data['project'] = $ps->getProjectById($id);
        $data['projectLocations'] = $ps->getProjectLocation($id);
        $data['employeeInfos'] = $es->getEmployeeProject();
        $data['previousProjectMembers'] = $ps->getProjectMember('on', $id);
        $data['previousProjectManagers'] = $ps->getPreviousManager($id);
        $data['projectMembers'] = $ps->getProjectMember('', $id);

        $data['role_permission'] = getPermissionCodeArray();

        // pr($data['projectMembers']);

        return view('pages.project.projectInfoEdit', $data);
    }

    public function updateProject(Request $r, $id)
    {
        $ss = new ProjectService;

        $result = $ss->updateProject($r, $id);

        return response()->json($result);
    }

    public function createProjectLocation(Request $r)
    {
        $ps = new ProjectService;

        $result = $ps->createProjectLocation($r);

        return response()->json($result);
    }

    public function getProjectLocationById($id)
    {
        $data = [];

        $ps = new ProjectService;

        $data = $ps->getProjectLocationById($id);
        // pr($data['project']);

        return response()->json($data);
    }

    public function updateProjectLocation(Request $r, $id)
    {
        $ss = new ProjectService;

        $result = $ss->updateProjectLocation($r, $id);

        return response()->json($result);
    }

    public function deleteProjectLocation($id)
    {
        $ps = new ProjectService;

        $result = $ps->deleteProjectLocation($id);

        return response()->json($result);
    }

    public function createProjectMember(Request $r)
    {
        $ps = new ProjectService;

        $result = $ps->createProjectMember($r);

        return response()->json($result);
    }

    public function getProjectMemberById($id)
    {
        $data = [];

        $ps = new ProjectService;

        $data = $ps->getProjectMemberById($id);
        // pr($data['project']);

        return response()->json($data);
    }
    public function getProjectandMemberById($id)
    {
        $data = [];

        $ps = new ProjectService;

        $data = $ps->getProjectandMemberById($id);
        // pr($data['project']);

        return response()->json($data);
    }

    public function getProjectbyIdDate($id)
    {
        $data = [];

        $ps = new ProjectService;

        $data = $ps->getProjectbyIdDate($id);
        // pr($data['project']);

        return response()->json($data);
    }

    public function updateProjectMember(Request $r, $id)
    {
        $ss = new ProjectService;

        $result = $ss->updateProjectMember($r, $id);

        return response()->json($result);
    }

    public function assignProjectMember(Request $r)
    {
        $ss = new ProjectService;

        $result = $ss->assignProjectMember($r);

        return response()->json($result);
    }

    public function projectRequestView()
    {
        $data = [];

        $ps = new ProjectService;

        $data['projectInfos'] = $ps->projectRequestView();
        //  dd($data['projectInfos']);
        $data['projectIdPending'] = $ps->projectPendingRequest('pending');
        $data['projectIdApprove'] = $ps->projectPendingRequest('approve');
        $data['projectIdReject'] = $ps->projectPendingRequest('reject');

        // pr($data);

        // foreach ($data['projectPending'] as $projectIdPending)
        // {
        //     $dateRequest = strtotime($projectIdPending->created_at);
        //     $now = strtotime(now());
        //     $hour = abs($dateRequest - $now)/(60*60);

        //     if ($hour < 24 && $dateRequest <= $now) {
        //         $data['projectIdPending'][] = $projectIdPending->project_id;
        //     }
        // }

        return view('pages.project.projectRequest', $data);
    }

    public function getRequestProjectById($id)
    {
        $ps = new ProjectService;
        $data = $ps->getProjectById($id);

        return response()->json($data);
    }

    public function addRequestProject(Request $r, $id)
    {
        $ss = new ProjectService;

        $result = $ss->addRequestProject($r, $id);

        return response()->json($result);
    }

    public function approveProjectMember(Request $r, $id)
    {
        $ss = new ProjectService;

        $result = $ss->updateStatusProjectMember($r, $id, 'approve');

        return response()->json($result);
    }

    public function rejectProjectMember(Request $r, $id)
    {
        $ss = new ProjectService;

        $result = $ss->updateStatusProjectMember($r, $id, 'reject');

        return response()->json($result);
    }

    public function cancelProjectMember(Request $r, $id)
    {
        $ss = new ProjectService;

        $result = $ss->updateStatusProjectMember($r, $id, 'cancel');

        return response()->json($result);
    }

    public function myProjectView()
    {
        $data = [];

        $ps = new ProjectService;

        $data['datas'] = $ps->myProjectView();
        // $data['pendings'] = $ps->myProjectView('pending');
        // $data['rejects'] = $ps->myProjectView('reject');

        return view('pages.project.myProject', $data);
    }

    public function projectViewAssignLocationView($id)
    {
        $ps = new ProjectService;

        $data = $ps->projectViewAssignLocationView($id);

        // Get the project data using the ProjectService
        $projectService = new ProjectService;
        $project = $projectService->getProjectById($data['projectMember']->project_id);

        // Pass the project data to the $data array
        $data['project'] = $project;

        return view('pages.project.projectViewAssignLocation', $data);
    }



    public function projectAssignView($id)
    {
        $data = [];

        $ps = new ProjectService;

        $data = $ps->projectAssignView($id);
        $projectService = new ProjectService;
        $project = $projectService->getProjectById($data['projectMember']->project_id);

        // Pass the project data to the $data array
        $data['project'] = $project;
        // pr($data);
        return view('pages.project.viewAssignLocation', $data);
    }

    public function deleteAssignLocation($id, $member_id)
    {
        $ss = new ProjectService;

        $result = $ss->deleteAssignLocation($id, $member_id);

        return response()->json($result);
    }

    public function getLocationsProjectMemberById($id)
    {
        $ss = new ProjectService;

        $result = $ss->getLocationsProjectMemberById($id);

        return response()->json($result);
    }

    public function projectNameByCustomerId($id)
    {
        $ss = new ProjectService;

        $result = $ss->projectNameByCustomerId($id);

        return response()->json($result);
    }

    public function getRejectProject($id)
    {
        $ss = new ProjectService;

        $result = $ss->getRejectProject($id);

        return response()->json($result);
    }
    public function projectLocTable()
    {

        return view('pages.project.projectLocTable');
    }
}
