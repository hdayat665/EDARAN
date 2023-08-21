<div class="sidebar" data-color="info" data-background-color="black" data-image="/public/img/sidebar-1.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
     -->
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-mini">
      HR
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      EDARAN
    </a></div>
  <div class="sidebar-wrapper">
    {{-- <div class="user">
      <div class="photo">
        <img src="/public/img/faces/avatar.jpg" />
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
            Tania Andrew
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> EP </span>
                <span class="sidebar-normal"> Edit Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> S </span>
                <span class="sidebar-normal"> Settings </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div> --}}
    <ul class="nav">
      <li class="nav-item active ">
        <a class="nav-link" href="/home">
          <i class="material-icons">dashboard</i>
          <p> Dashboard </p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
          <i class="material-icons">image</i>
          <p> HRIS
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="pagesExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="/profile">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Profile</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/pages/rtl.html">
                <span class="sidebar-mini"> EI </span>
                <span class="sidebar-normal">Employee Information</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
          <i class="material-icons">apps</i>
          <p> Timesheet
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="componentsExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                <span class="sidebar-mini"> MT </span>
                <span class="sidebar-normal"> My Timesheet</span>
              </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#0">
                    <span class="sidebar-mini"> TA </span>
                    <span class="sidebar-normal"> Timesheets Approval</span>
                </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/components/buttons.html">
                <span class="sidebar-mini"> RA </span>
                <span class="sidebar-normal"> Realtime Activity</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#formsExamples">
          <i class="material-icons">content_paste</i>
          <p> E-Attendance
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="formsExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/forms/regular.html">
                <span class="sidebar-mini"> MA </span>
                <span class="sidebar-normal"> My Attendance                </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/forms/extended.html">
                <span class="sidebar-mini"> AI </span>
                <span class="sidebar-normal"> Attendance Information                </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
          <i class="material-icons">grid_on</i>
          <p> eLeave
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="tablesExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/tables/regular.html">
                <span class="sidebar-mini"> ML </span>
                <span class="sidebar-normal"> My Leave                </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/tables/extended.html">
                <span class="sidebar-mini"> LA </span>
                <span class="sidebar-normal"> Leave Approval                </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
          <i class="material-icons">place</i>
          <p> Project
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="mapsExamples">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/google.html">
                <span   class="sidebar-mini"> C </span>
                <span class="sidebar-normal"> Customers                </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/fullscreen.html">
                <span class="sidebar-mini"> PI </span>
                <span class="sidebar-normal"> Project Information                </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/vector.html">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Project                </span>
              </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/maps/vector.html">
                  <span class="sidebar-mini"> PR </span>
                  <span class="sidebar-normal"> Project Request                </span>
                </a>
              </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#claim">
          <i class="material-icons">money</i>
          <p> Claim
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="claim">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/google.html">
                <span   class="sidebar-mini"> MC </span>
                <span class="sidebar-normal"> My Claim                </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/fullscreen.html">
                <span class="sidebar-mini"> CA </span>
                <span class="sidebar-normal"> Claim Approval                </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#ORG">
          <i class="material-icons">groups</i>
          <p> Organization
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="ORG">
          <ul class="nav">
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/google.html">
                <span class="sidebar-mini"> PD </span>
                <span class="sidebar-normal"> Phone Directory                </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="../examples/maps/fullscreen.html">
                <span class="sidebar-mini"> OC </span>
                <span class="sidebar-normal"> Organisation Chart                </span>
              </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/maps/fullscreen.html">
                  <span class="sidebar-mini"> DT </span>
                  <span class="sidebar-normal"> Department Tree                </span>
                </a>
              </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#report">
          <i class="material-icons">summarize</i>
          <p> Reporting
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="report">
          <ul class="nav">
            <li class="nav-item active ">
                <a class="nav-link" data-toggle="collapse" href="#timesheet" aria-expanded="true">
                  <span class="sidebar-mini"> T </span>
                  <span class="sidebar-normal"> Timesheet
                    <b class="caret"></b>
                  </span>
                </a>
                <div class="collapse" id="timesheet">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> SR </span>
                        <span class="sidebar-normal"> Status Report                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> ER </span>
                        <span class="sidebar-normal"> Employee Report
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> OR </span>
                        <span class="sidebar-normal"> Overtime Report
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" data-toggle="collapse" href="#EA" aria-expanded="true">
                  <span class="sidebar-mini"> EA </span>
                  <span class="sidebar-normal"> E-Attendance
                    <b class="caret"></b>
                  </span>
                </a>
                <div class="collapse" id="EA">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> DR </span>
                        <span class="sidebar-normal"> Daily Report                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> SR </span>
                        <span class="sidebar-normal"> Status Report
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" aria-expanded="true">
                  <span class="sidebar-mini"> EL </span>
                  <span class="sidebar-normal"> eLeave
                  </span>
                </a>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" data-toggle="collapse" href="#project" aria-expanded="true">
                  <span class="sidebar-mini"> P </span>
                  <span class="sidebar-normal"> Project
                    <b class="caret"></b>
                  </span>
                </a>
                <div class="collapse" id="project">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> PL </span>
                        <span class="sidebar-normal"> Project Listing                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> PS </span>
                        <span class="sidebar-normal"> Project Status
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" data-toggle="collapse" href="#claims" aria-expanded="true">
                  <span class="sidebar-mini"> C </span>
                  <span class="sidebar-normal"> Claim
                    <b class="caret"></b>
                  </span>
                </a>
                <div class="collapse" id="claims">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> C </span>
                        <span class="sidebar-normal"> Claim                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> CA </span>
                        <span class="sidebar-normal"> Cash Advance
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#setting">
          <i class="material-icons">settings</i>
          <p> Settings
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="setting">
          <ul class="nav">
            <li class="nav-item active ">
                <a class="nav-link" data-toggle="collapse" href="#gs" aria-expanded="true">
                  <span class="sidebar-mini"> GS </span>
                  <span class="sidebar-normal"> General Settings

                    <b class="caret"></b>
                  </span>
                </a>
                <div class="collapse" id="gs">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> R </span>
                        <span class="sidebar-normal"> Roles
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> C </span>
                        <span class="sidebar-normal"> Company
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> D </span>
                        <span class="sidebar-normal"> Department
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> U </span>
                        <span class="sidebar-normal"> Unit
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> B </span>
                        <span class="sidebar-normal"> Branch
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> JG </span>
                        <span class="sidebar-normal"> Job Grade
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> D </span>
                        <span class="sidebar-normal"> Designation
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> ET </span>
                        <span class="sidebar-normal"> Employment Type
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> S </span>
                        <span class="sidebar-normal"> SOPs
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> N </span>
                        <span class="sidebar-normal"> News
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" data-toggle="collapse" href="#ts" aria-expanded="true">
                  <span class="sidebar-mini"> TS </span>
                  <span class="sidebar-normal"> Timesheet Settings

                    <b class="caret"></b>
                  </span>
                </a>
                <div class="collapse" id="ts">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> TP </span>
                        <span class="sidebar-normal"> Timesheet Period
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> L </span>
                        <span class="sidebar-normal"> Type of Logs
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> L </span>
                        <span class="sidebar-normal"> Location
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" data-toggle="collapse" href="#leave" aria-expanded="true">
                  <span class="sidebar-mini"> E </span>
                  <span class="sidebar-normal"> eLeave
                    <b class="caret"></b>
                  </span>
                </a>
                <div class="collapse" id="leave">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> LE </span>
                        <span class="sidebar-normal"> Leave Entitlement
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> LT </span>
                        <span class="sidebar-normal"> Leave Types
                        </span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" href="#0">
                        <span class="sidebar-mini"> H </span>
                        <span class="sidebar-normal"> Holiday
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
  <div class="sidebar-background"></div>
</div>
