<?php
namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Service\CustomerService;
use App\Service\EmployeeService;
use App\Service\ProjectService;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function projectInfoView()
    {
        $data = [];

        $ps = new ProjectService;

        $data = $ps->projectInfoView();

        return view('pages.project.projectInfo', $data);
    }

    public function createProject(Request $r)
    {
        $ps = new ProjectService;

        $result = $ps->createProject($r);

        return response()->json($result);
    }

    public function projectInfoEditView($id)
    {
        $data = [];

        $es = new EmployeeService;
        $ps = new ProjectService;

        $data['project'] = $ps->getProjectById($id);
        $data['projectLocations'] = $ps->getProjectLocation();
        $data['employeeInfos'] = $es->getEmployeeProject();
        // pr($data['employeeInfos']);

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
}
