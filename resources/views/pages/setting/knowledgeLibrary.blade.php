@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <h1 class="page-header" id="knowledgeLiBJs">Setting <small>| Knowledge Library</small></h1>
    <div class="panel panel">
        <div class="panel-heading">
            <div class="col-md-6">
                <a href="javascript:;" data-bs-toggle="modal" id="addButton" class="btn btn-primary"><i class="fa fa-plus"></i> Knowledge Library</a>
            </div>
            <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
            <table id="tablenews" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="text-nowrap">Title</th>
                        <th class="text-nowrap">Content</th>
                        <th class="text-nowrap">Attachment</th>
                        <th class="text-nowrap">Added By</th>
                        <th class="text-nowrap">Added Time</th>
                        <th class="text-nowrap">Modified By</th>
                        <th class="text-nowrap">Modified Time</th>
                        <th width="9%" data-orderable="false" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0 ?>
                    @if ($knowledge)
                    @foreach ($knowledge as $know)
                    <?php $id++ ?>
                    <tr class="odd gradeX">
                        <td width="1%" class="fw-bold text-dark">{{$id}}</td>
                        <td>{{$know->title}}</td>
                        <td>{{$know->content}}</td>
                        <td><a href="/storage/{{ $know->file }}" target="_blank">{{ $know->file }}</a></td>
                        <td>{{$know->addedBy}}</td>
                        <td>{{$know->created_at}}</td>
                        <td>{{$know->modifiedBy}}</td>
                        <td>{{$know->modified_at}}</td>
                        <td>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle"></i> Actions <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                            <a href="javascript:;" id="editButton" data-id="{{$know->id}}" class="dropdown-item"> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a id="deleteButton" data-id="{{$know->id}}" class="dropdown-item"> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="row p-2">
                <div class="col align-self-start">
                    <a href="/setting" class="btn btn-primary" type="submit"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- END row -->
@include('modal.setting.general.addKnowledgeLib');
@include('modal.setting.general.editKnowledgeLib');
@endsection
