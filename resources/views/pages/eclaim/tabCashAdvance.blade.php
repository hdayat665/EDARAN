<div class="tab-pane fade" id="card-pill-2">
    <div class="category-filter">
        <select id="Statuscash" class="form-control" style=" width: 200px; margin-left: auto; margin-right: 0;">
            <option value="">Show All</option>
            <option value="Draft">Draft</option>
            <option value="Active">Active</option>
            <option value="Rejected">Rejected</option>
            <option value="Rejected">Amend</option>
            <option value="Jazz">Paid</option>
        </select>
    </div>
    <table id="cashadvancetable" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th class="text-nowrap">Action</th>
                <th class="text-nowrap">Cash Advance ID</th>
                <th class="text-nowrap">Type of Cash Advance</th>
                <th class="text-nowrap">Request Date</th>
                <th class="text-nowrap">Travel Date</th>
                <th class="text-nowrap">Amount</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Status Date</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd gradeX">
                <td>
                    <div class="btn-group me-1 mb-1">
                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i
                                class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/eclaim/updatecashadvance" class="dropdown-item">Update Claim</a>
                        </div>
                    </div>
                </td>
                <td>101</td>
                <td>Project ( Outstation )</td>
                <td>04/05/2022</td>
                <td>07/06/2022</td>
                <td>MYR 100.00</td>
                <td><span class="badge bg-warning" data-toggle="drafca" title="Draft">Draft</span></td>
                <td>20/09/2022</td>
            </tr>
            <tr class="odd gradeX">
                <td>
                    <div class="btn-group me-1 mb-1">
                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i
                                class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/eclaim/viewcashprojectoutstation" class="dropdown-item">View Claim</a>
                            <a href="/eclaim/updatecashadvance" class="dropdown-item">Update Claim</a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:;" class="dropdown-item">Cancel Claim</a>
                        </div>
                    </div>
                </td>
                <td>102</td>
                <td>Project ( Outstation )</td>
                <td>04/06/2022</td>
                <td>06/06/2022</td>
                <td>MYR 100.00</td>
                <td><span class="badge bg-lime" data-toggle="activeca" title="Active">Active</span></td>
                <td>20/09/2022</td>
            </tr>
            <tr class="even gradeC">
                <td>
                    <div class="btn-group me-1 mb-1">
                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i
                                class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/eclaim/viewcashprojectnoneoutstation" class="dropdown-item">View Claim</a>
                        </div>
                    </div>
                </td>
                <td>103</td>
                <td>Project ( Non-Outstation )</td>
                <td>03/07/2022</td>
                <td>07/07/2022</td>
                <td>MYR 100.00</td>
                <td><span class="badge bg-danger" data-toggle="rejectedca" title="Rejected">Rejected</span></td>
                <td>20/09/2022</td>
            </tr>
            <tr class="even gradeC">
                <td>
                    <div class="btn-group me-1 mb-1">
                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i
                                class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/eclaim/viewcashothersoutstation" class="dropdown-item">View Claim</a>
                            <a href="/eclaim/updatecashadvance" class="dropdown-item">Update Claim</a>
                        </div>
                    </div>
                </td>
                <td>104</td>
                <td>Others ( Outstation )</td>
                <td>08/08/2022</td>
                <td>10/08/2022</td>
                <td>MYR 100.00</td>
                <td><span class="badge bg-success" data-toggle="amendca" title="Amend">Amend</span></td>
                <td>20/09/2022</td>
            </tr>
            <tr class="even gradeC">
                <td>
                    <div class="btn-group me-1 mb-1">
                        <a href="javascript:;" class="btn btn-primary btn-sm">Action</a>
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm"><i
                                class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="/eclaim/viewcashothersnoneoutstation" class="dropdown-item">View Claim</a>
                        </div>
                    </div>
                </td>
                <td>105</td>
                <td>Others ( Non-Oustation )</td>
                <td>11/12/2022</td>
                <td>09/12/2022</td>
                <td>MYR 100.00</td>
                <td><span class="badge bg-secondary" data-toggle="paidca" title="Paid">Paid</span></td>
                <td>20/09/2022</td>
            </tr>
        </tbody>
    </table>
</div>
