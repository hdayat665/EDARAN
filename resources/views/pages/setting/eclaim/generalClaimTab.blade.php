<div class="tab-pane fade" id="default-tab-2">
    <div class="panel-body">
        <div style="overflow-x:auto;">
            <table id="table-general" class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="1%">&nbsp;</th>
                        <th>&nbsp;</th>
                        <th colspan="5">&nbsp;</th>
                        <th colspan="4" style="text-align: center">CHECKER 1</th>
                        <th colspan="4" style="text-align: center">CHECKER 2</th>
                        <th colspan="4" style="text-align: center">CHECKER 3</th>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <th style="width:180px;text-align: center;">ROLE</th>
                        <th style="text-align: center">STATUS</th>
                        <th style="text-align: center">APPROVE</th>
                        <th style="text-align: center">REJECT</th>
                        <th style="text-align: center">AMEND</th>
                        <th style="text-align: center">CANCEL</th>
                        <th style="text-align: center">CHECK</th>
                        <th style="text-align: center;">GENERATE&nbsp;PV</th>
                        <th style="text-align: center">PAYMENT</th>
                        <th style="text-align: center">PAID</th>
                        <th style="text-align: center">CHECK</th>
                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                        <th style="text-align: center">PAYMENT</th>
                        <th style="text-align: center">PAID</th>
                        <th style="text-align: center">CHECK</th>
                        <th style="text-align: center">GENERATE&nbsp;PV</th>
                        <th style="text-align: center">PAYMENT</th>
                        <th style="text-align: center">PAID</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($configs)
                        @foreach ($configs as $config)
                            @if ($config->type_claim == 'general')
                                <tr>
                                    <td>1</td>
                                    <td width="40%">{{ $config->role ?? '-' }}</td>
                                    <td>
                                        <div class="form-check form-switch d-flex justify-content-center">
                                            <input class="form-check-input" name="mainCompanion" id="statusCheck" data-id="{{ $config->id }}" data-role="{{ $config->role }}" type="checkbox"
                                                {{ $config->status ? 'checked' : '' }} role="" id="">
                                        </div>
                                    </td>
                                    @if (in_array($config->role, ['SUPERVISOR - RECOMMENDER', 'HOD / CEO - APPROVER', 'ADMIN - RECOMMENDER', 'ADMIN - APPROVER', 'FINANCE - RECOMMENDER', 'FINANCE - APPROVER']))
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" {{ $config->approve ? 'checked' : '' }} type="checkbox" disabled />
                                        </td>
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" {{ $config->reject ? 'checked' : '' }} type="checkbox" disabled />
                                        </td>
                                        <td style="text-align: center">
                                            <input class="form-check-input" id="amendCheck" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->amend ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center">
                                            <input class="form-check-input" id="cancelCheck" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->cancel ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" {{ $config->check1 ? 'checked' : '' }} disabled />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" {{ $config->check2 ? 'checked' : '' }} disabled />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" {{ $config->check3 ? 'checked' : '' }} disabled />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid3 ? 'checked' : '' }} />
                                        </td>
                                    @endif

                                    @if ($config->role == 'ADMIN - CHECKER')
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" {{ $config->approve ? 'checked' : '' }} type="checkbox" disabled />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled />
                                        </td>
                                        <td style="text-align: center">
                                            <input class="form-check-input" id="amendCheck" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->amend ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center">
                                            <input class="form-check-input" id="cancelCheck" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->cancel ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" type="checkbox" {{ $config->check1 ? 'checked' : '' }} disabled />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" id="check2Check" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->check2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" id="check3Check" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->check3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid3 ? 'checked' : '' }} />
                                        </td>
                                    @endif

                                    @if ($config->role == 'FINANCE - CHECKER')
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" {{ $config->approve ? 'checked' : '' }} type="checkbox" disabled />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" {{ $config->reject ? 'checked' : '' }} type="checkbox" disabled />
                                        </td>
                                        <td style="text-align: center">
                                            <input class="form-check-input" id="amendCheck" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->amend ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center">
                                            <input class="form-check-input" id="cancelCheck" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->cancel ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" type="checkbox" {{ $config->check1 ? 'checked' : '' }} disabled />
                                        </td>
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:MediumSpringGreen!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid1 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" id="check2Check" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->check2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid2 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" id="check3Check" data-role="{{ $config->role }}" data-id="{{ $config->id }}" type="checkbox"
                                                {{ $config->check3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->generate_pv3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->payment3 ? 'checked' : '' }} />
                                        </td>
                                        <td style="text-align: center;background-color:darkgray!important;">
                                            <input class="form-check-input" type="checkbox" disabled {{ $config->paid3 ? 'checked' : '' }} />
                                        </td>
                                    @endif

                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
