<!doctype html>
<html lang="en">
<head>


{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>--}}

    <link href="{{ asset('/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/jquery-timepicker/jquery.timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dashforge.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">


    <script src="{{ asset('/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/lib/jqueryui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lib/feather-icons/feather.min.js') }}"></script>
    {{--    <script src="{{ asset('/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>--}}
    <script src="{{ asset('/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/lib/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/lib/select2/js/select2.full.min.js') }}"></script>
    <script src="{{asset('/lib/fullcalendar/tr.js')}}"></script>
    <script src="{{asset('/lib/jquery-timepicker/jquery.timepicker.min.js')}}"></script>

    <style>
        {{-- ///  --}}
    </style>
</head>
<body>


<nav class="navbar">
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        <li >
            <form action="/logout" method="post">
                <button class="btn btn-danger pd-5-f" type="submit">Çıkış</button>
            </form>
        </li>
    </ul>
</nav>


<div class="calendar-wrapper">
    <div class="calendar-sidebar">
        <div class="calendar-sidebar-header">
{{--            <i data-feather="search"></i>--}}
{{--            <div class="search-form">--}}
{{--                <input type="search" class="form-control" placeholder="Search calendar">--}}
{{--            </div>--}}
            {{--<a href="" class="btn btn-sm btn-primary btn-icon calendar-add">
                <div data-toggle="tooltip" title="Create New Event"><i data-feather="plus"></i></div>
            </a>--}}<!-- calendar-add -->
        </div><!-- calendar-sidebar-header -->
        <div id="calendarSidebarBody" class="calendar-sidebar-body">
            {{--<div class="calendar-inline">
                <div id="calendarInline"></div>
            </div>--}}<!-- calendar-inline -->

            <form action="" method="post" enctype="multipart/form-data">
                <h3 class="pd-10-f">Yeni Kayıt</h3>

                <div class="form-group pd-x-10-f" id="date_container">
                    <label for="">Başlık</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group pd-x-10-f" id="date_container">
                    <label for="">Açıklama</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group pd-x-10-f">
                    <label for="">Takvim Kayıt Türü</label>
                    <select name="calendar_type" id="calendar_type" class="form-control">
                        <option value="event">Etkinlik (Düğün vb.)</option>
                        <option value="anniversary">Yıl Dönümü (Doğum Günü vb.)</option>
                    </select>
                </div>
                <div class="form-group pd-x-10-f" id="date_container">
                    <label for="">Tarih</label>
                    <input type="text" name="event_date" id="event_date" class="form-control" autocomplete="off">
                    <input type="text" name="anniversary_date" id="anniversary_date" class="form-control d-none" autocomplete="off">
                </div>
                <div class="form-group pd-x-10-f" id="timepicker_container">
                    <label for="">Saat</label>
                    <input type="text" name="timepicker" id="timepicker" class="form-control text-center" autocomplete="off">
                </div>
                <div class="form-group pd-x-10-f">
                    <label for="">Resim</label>
                    <input type="file" name="event_image" id="event_image" class="form-control-file">
                </div>
                <div class="form-group pd-x-10-f text-right">
                    <button type="submit" name="save" class="btn btn-primary">Kaydet</button>
                </div>
            </form>

            {{--<div class="pd-y-20 pd-x-15">
                <label class="tx-uppercase tx-sans tx-10 tx-medium tx-spacing-1 tx-color-03 pd-l-10 mg-b-10">Takvim</label>
                <input type="hidden" name="order_status" id="order_status" value="orderStatus">
                <nav class="calendar-nav">
                    <a href="#" role="button" class="btn btn-outline-success"><span></span>Siparişler</a>
                    <br/>
                    <a href="#"  role="button" class="btn btn-outline-danger"><span></span>Ödeme Bekleyenler</a>
                </nav>
                --}}{{--<hr>
                <div class="schedule-group">
                    <a href="#" class="schedule-item bd-l bd-2 bd-danger">
                        <h6>Ev Temizliği</h6>
                    </a>
                    <a href="#" class="schedule-item bd-l bd-2 bd-success">
                        <h6>Bayram Temizliği</h6>
                    </a>
                    <a href="#" class="schedule-item bd-l bd-2 bd-primary">
                        <h6>Dezenfeksiyon Hizmeti</h6>
                    </a>
                </div>--}}{{--
            </div>--}}

        </div><!-- calendar-sidebar-body -->
    </div><!-- calendar-sidebar -->
    <div class="calendar-content">
        <div id="calendar" class="calendar-content-body"></div>
    </div><!-- calendar-content -->
</div><!-- calendar-wrapper -->



<div class="modal calendar-modal-event fade effect-scale" id="modalCalendarEvent" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="event-title"></h6>
                <nav class="nav nav-modal-event">
                    <a href="" target="_blank" class="nav-link order-link"><i data-feather="external-link"></i></a>
{{--                    <a href="#" class="nav-link"><i data-feather="trash-2"></i></a>--}}
                    <a href="#" class="nav-link" data-dismiss="modal"><i data-feather="x"></i>x</a>
                </nav>
            </div><!-- modal-header -->
            <div class="modal-body">
                <div class="row row-sm">
                    <div class="col-sm-12">
{{--                        <p class="event-warning pd-10-f" style="background-color: #fff3cd;color: red;"></p>--}}
                        <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Tarih</label>
                        <p class="event-start-date"></p>
                    </div>
                </div><!-- row -->

                <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Açıklama/Not</label>
                <p class="event-desc tx-gray-900 mg-b-40"></p>

                <div id="event-image-container">
                    <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Foto</label>
                    <div class="img">
                        <img src="" class="event-image tx-gray-900 mg-b-40" style="max-width: 250px;max-height: 250px;">
                    </div>
                </div>



                <a href="" class="btn btn-secondary pd-x-20" data-dismiss="modal">Kapat</a>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


<script>
    var $calendarEvents = @json($calendarEvents);

    $(function(){

        $('#calendar_type').change(function (){
            console.log($(this).val());
            var calendar_type = $(this).val()

            if (calendar_type === 'event') {
                $('#event_date').removeClass('d-none');
                $('#timepicker_container').removeClass('d-none');
                $('#timepicker').removeClass('d-none');
                $('#anniversary_date').addClass('d-none');
                $('#anniversary_date').val('');
            }
            else if (calendar_type === 'anniversary') {
                $('#event_date').addClass('d-none');
                $('#anniversary_date').removeClass('d-none');
                $('#event_date').val('');
                $('#timepicker_container').addClass('d-none');
                $('#timepicker').addClass('d-none');
                $('#timepicker').val('');
            }
        });

        $('#event_date').datepicker({
            dateFormat:'dd/mm/yy',
            regional: 'tr',
            changeMonth: true,
            changeYear: true,
        });
        $('#anniversary_date').datepicker({
            dateFormat:'dd/mm',
            regional: 'tr',
        });
        $('#timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 15,
            minTime: '00:00',
            maxTime: '23:59',
            defaultTime: '09:00 am',
            startTime: '00:00 am',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

        // Initialize scrollbar for sidebar
        // new PerfectScrollbar('#calendarSidebarBody', {
        //     suppressScrollX: true
        // });

        $('#calendarSidebarShow').on('click', function(e){
            e.preventDefault();
            $('body').toggleClass('calendar-sidebar-show');

            $(this).addClass('d-none');
            $('#mainMenuOpen').removeClass('d-none');
        });

        $(document).on('click touchstart', function(e){
            e.stopPropagation();

            // closing of sidebar menu when clicking outside of it
            if(!$(e.target).closest('.burger-menu').length) {
                var sb = $(e.target).closest('.calendar-sidebar').length;
                if(!sb) {
                    $('body').removeClass('calendar-sidebar-show');

                    $('#mainMenuOpen').addClass('d-none');
                    $('#calendarSidebarShow').removeClass('d-none');
                }
            }
        });

    });
</script>

<script src="{{asset('/js/calendar/calendar.js')}}"></script>

</body>
</html>
