@include('auth.head')
@include('fm.menu')
@include('auth.alert')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">messages</i>
                                </div>
                                <p class="card-category">Messages</p>
                                <h4 class="card-title">@include('fm.messenger.unread-count') Unread
                                </h4>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">copy</i>
                                    <a href="{{ route('fm.messages') }}">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">receipt</i>
                                </div>
                                <p class="card-category">Invoices</p>
                                <h4 class="card-title">0 Unpaid</h4>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">copy</i>
                                    <a href="">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">contact_support</i>
                                </div>
                                <p class="card-category">Services</p>
                                <h4 class="card-title">{{ $count_unread_notices }} </h4>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">copy</i>
                                    <a href="{{ route('request') }}">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment_late</i>
                                </div>
                                <p class="card-category">Complaints</p>
                                <h3 class="card-title">{{ count($events) }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">copy</i>
                                    <a href="{{ route('complaint') }}">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('auth.ads')
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Recent Notices</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @forelse($notices as $notice)
                                        <tr>
                                            <td>{{ $notice->title }}</td>
                                            <td>
                                                {{ $notice->body }}
                                            </td>
                                            <td>
                                                <form>
                                                    <button type="submit" class="btn btn-primary">
                                                        <span class="material-icons">done_all</span>  Mark as read
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <b>No Notification Now</b>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Events</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <div class="container">
                                    <div class="response"></div>
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<script>
    $(document).ready(function () {
        var SITEURL = "{{url('/fm')}}/";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#calendar').fullCalendar({
            editable: false,
            events: SITEURL + "fullcalendar",
            displayEventTime: true,
            editable: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: false,
            selectHelper: false,
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + "fullcalendar/create",
                        data:{
                            title:title,
                            start:start,
                            end:end
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Added Successfully");
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true
                    );
                }
                calendar.fullCalendar('unselect');
            },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: SITEURL + 'fullcalendar/update',
                    data:{
                        title:event.title,
                        start:start,
                        end:end,
                        id:event.id
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Updated Successfully");
                    }
                });
            }
        });
    });
    function displayMessage(message) {
        $(".response").html("<div class='success'>"+message+"</div>");
        setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
</script>@include('auth.foot')
