<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="A fully featured admin theme which can be used to build CRM, CMS, etc."
      name="description"
    />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo2.png" />

    <!-- third party css -->
    <link
      href="assets/css/vendor/jquery-jvectormap-1.2.2.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- third party css end -->
    <!-- third party css -->
    <link
      href="assets/css/vendor/fullcalendar.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- third party css end -->
    <!-- App css -->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="enlarged" data-keep-enlarged="true">
    <!-- Begin page -->
    <div class="wrapper">
      <!-- ===================== Left Sidebar Start ===================== -->
      <?php include "side.php";?>
      <!-- ====================== Left Sidebar End ====================== -->

      <!-- ============================================================== -->
      <!-- ================== Start Page Content here =================== -->

      <div class="content-page">
        <div class="content">
          <!-- ==================== Topbar Start ==================== -->
          <?php include "top.php";?>
          <!-- ===================== Topbar End ===================== -->

          <!-- Start Content-->
          <div class="container-fluid">
            <!-- ================ start page title ================ -->
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Asset Manager</a>
                      </li>
                      <li class="breadcrumb-item active">Calendar</li>
                    </ol>
                  </div>
                  <h4 class="page-title">
                    <i class="mdi mdi-calendar-clock"></i> Calendar
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3">
                        <a
                          href="#"
                          data-toggle="modal"
                          data-target="#add-category"
                          class="btn btn-lg font-16 btn-primary btn-block  "
                        >
                          <i class="mdi mdi-plus-circle-outline"></i> Create New
                          Event
                        </a>
                        <div id="external-events" class="m-t-20">
                          <br />
                          <p class="text-muted">
                            Drag and drop your event or click in the calendar
                          </p>
                          <div
                            class="external-event bg-success"
                            data-class="bg-success"
                          >
                            <i
                              class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"
                            ></i
                            >New Theme Release
                          </div>
                          <div
                            class="external-event bg-info"
                            data-class="bg-info"
                          >
                            <i
                              class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"
                            ></i
                            >My Event
                          </div>
                          <div
                            class="external-event bg-warning"
                            data-class="bg-warning"
                          >
                            <i
                              class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"
                            ></i
                            >Meet manager
                          </div>
                          <div
                            class="external-event bg-danger"
                            data-class="bg-danger"
                          >
                            <i
                              class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"
                            ></i
                            >Create New theme
                          </div>
                        </div>

                        <!-- checkbox -->
                        <div class="custom-control custom-checkbox mt-3">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="drop-remove"
                          />
                          <label class="custom-control-label" for="drop-remove"
                            >Remove after drop</label
                          >
                        </div>

                        <div class="mt-5 d-none d-xl-block">
                          <h5 class="text-center">How It Works ?</h5>

                          <ul class="pl-3">
                            <li class="text-muted mb-3">
                              It has survived not only five centuries, but also
                              the leap into electronic typesetting, remaining
                              essentially unchanged.
                            </li>
                            <li class="text-muted mb-3">
                              Richard McClintock, a Latin professor at
                              Hampden-Sydney College in Virginia, looked up one
                              of the more obscure Latin words, consectetur, from
                              a Lorem Ipsum passage.
                            </li>
                            <li class="text-muted mb-3">
                              It has survived not only five centuries, but also
                              the leap into electronic typesetting, remaining
                              essentially unchanged.
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- end col-->

                      <div class="col-lg-9">
                        <div id="calendar"></div>
                      </div>
                      <!-- end col -->
                    </div>
                    <!-- end row -->
                  </div>
                  <!-- end card body-->
                </div>
                <!-- end card -->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div
                        class="modal-header pr-4 pl-4 border-bottom-0 d-block"
                      >
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-hidden="true"
                        >
                          &times;
                        </button>
                        <h4 class="modal-title">Add New Event</h4>
                      </div>
                      <div class="modal-body pt-3 pr-4 pl-4"></div>
                      <div class="text-right pb-4 pr-4">
                        <button
                          type="button"
                          class="btn btn-light "
                          data-dismiss="modal"
                        >
                          Close
                        </button>
                        <button
                          type="button"
                          class="btn btn-success save-event  "
                        >
                          Create event
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger delete-event  "
                          data-dismiss="modal"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                    <!-- end modal-content-->
                  </div>
                  <!-- end modal dialog-->
                </div>
                <!-- end modal-->

                <!-- Modal Add Category -->
                <div class="modal fade" id="add-category" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0 d-block">
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-hidden="true"
                        >
                          &times;
                        </button>
                        <h4 class="modal-title">Add a category</h4>
                      </div>
                      <div class="modal-body p-4">
                        <form>
                          <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <input
                              class="form-control form-white"
                              placeholder="Enter name"
                              type="text"
                              name="category-name"
                            />
                          </div>
                          <div class="form-group">
                            <label class="control-label"
                              >Choose Category Color</label
                            >
                            <select
                              class="form-control form-white"
                              data-placeholder="Choose a color..."
                              name="category-color"
                            >
                              <option value="primary">Primary</option>
                              <option value="success">Success</option>
                              <option value="danger">Danger</option>
                              <option value="info">Info</option>
                              <option value="warning">Warning</option>
                              <option value="dark">Dark</option>
                            </select>
                          </div>
                        </form>

                        <div class="text-right">
                          <button
                            type="button"
                            class="btn btn-light "
                            data-dismiss="modal"
                          >
                            Close
                          </button>
                          <button
                            type="button"
                            class="btn btn-primary ml-1   save-category"
                            data-dismiss="modal"
                          >
                            Save
                          </button>
                        </div>
                      </div>
                      <!-- end modal-body-->
                    </div>
                    <!-- end modal-content-->
                  </div>
                  <!-- end modal dialog-->
                </div>
                <!-- end modal-->
              </div>
              <!-- end col-12 -->
            </div>
            <!-- end row -->
          </div>
          <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <?php include "footer.php";?>
        <!-- end Footer -->
      </div>

      <!-- ====================== End Page content ====================== -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="assets/js/app.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/fullcalendar.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.calendar.js"></script>
    <!-- end demo js-->

    <!-- third party js -->
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- end demo js-->
  </body>
</html>
