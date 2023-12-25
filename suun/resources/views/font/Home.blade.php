<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- 从 CDN 引入 wow.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<link rel="stylesheet" href="{{ asset('main/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('calendar/fonts/icomoon/style.css') }}">
<link rel="stylesheet" href="{{ asset('calendar/fullcalendar/packages/core/main.css') }}">
<link rel="stylesheet" href="{{ asset('calendar/fullcalendar/packages/daygrid/main.css') }}">


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('calendar/css/bootstrap.min.css') }}">

<!-- Style -->
<link rel="stylesheet" href="{{ asset('calendar/css/style.css') }}">

<script src="{{ asset('calendar/js/popper.min.js') }}"></script>
<script src="{{ asset('main/js/main.js') }}"></script>
{{--非預設樣式引入--}}
<link rel="stylesheet" href="{{ asset('calendar/self_element.css') }}">

{{--<script src="../../../spcTest/js/bootstrap.min.js"></script>--}}

<script src="{{ asset('calendar/fullcalendar/packages/core/main.js') }}"></script>
<script src="{{ asset('calendar/fullcalendar/packages/interaction/main.js') }}"></script>
<script src="{{ asset('calendar/fullcalendar/packages/daygrid/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">



<div class="content">
    <div id='calendar'>
    </div>
</div>

<x-head.tinymce-config/>
{{--<script src='path/to/fullcalendar/locales/zh-tw.js'></script>--}}


{{--<script src="{{ asset('calendar/js/main.js') }}"></script>--}}


<!-- 發文 Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
{{--            <h6 class="text-primary">最新消息</h6>--}}
            <h1 class="mb-4">最新資訊</h1>
        </div>
        {{--        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">--}}
        {{--            <div class="col-12 text-center">--}}
        {{--                <ul class="list-inline mb-5" id="portfolio-flters">--}}
        {{--                    <li class="mx-2 active" data-filter="*">All</li>--}}
        {{--                    <li class="mx-2" data-filter=".first">Solar Panels</li>--}}
        {{--                    <li class="mx-2" data-filter=".second">Wind Turbines</li>--}}
        {{--                    <li class="mx-2" data-filter=".third">Hydropower Plants</li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row g-4 portfolio-container wow fadeInUp justify-content-center" data-wow-delay="0.5s">
            @foreach($pPost as $Post)
                <div class="col-lg-4 col-md-6 portfolio-item ">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid" src="{{ asset('storage/'.$Post['image_path']) }}" alt="">
                        <div class="portfolio-btn">
                            <button class="btn btn-lg-square btn-outline-light rounded-circle mx-1 post_detail"
                                    data-post="{{$Post['id']}}"
                                    data-lightbox="portfolio"><i class="fa fa-eye"></i></button>
                            {{--                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>--}}
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0">{{$Post['title']}}</p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">{{$Post['subtitle']}}</h5>
                    </div>
                </div>
            @endforeach
            {{--            <div class="col-lg-4 col-md-6 portfolio-item second">--}}
            {{--                <div class="portfolio-img rounded overflow-hidden">--}}
            {{--                    <img class="img-fluid" src="img/img-600x400-5.jpg" alt="">--}}
            {{--                    <div class="portfolio-btn">--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="img/img-600x400-5.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="pt-3">--}}
            {{--                    <p class="text-primary mb-0">Wind Turbines</p>--}}
            {{--                    <hr class="text-primary w-25 my-2">--}}
            {{--                    <h5 class="lh-base">We Are pioneers of solar & renewable energy industry</h5>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-lg-4 col-md-6 portfolio-item third">--}}
            {{--                <div class="portfolio-img rounded overflow-hidden">--}}
            {{--                    <img class="img-fluid" src="img/img-600x400-4.jpg" alt="">--}}
            {{--                    <div class="portfolio-btn">--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="img/img-600x400-4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="pt-3">--}}
            {{--                    <p class="text-primary mb-0">Hydropower Plants</p>--}}
            {{--                    <hr class="text-primary w-25 my-2">--}}
            {{--                    <h5 class="lh-base">We Are pioneers of solar & renewable energy industry</h5>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-lg-4 col-md-6 portfolio-item first">--}}
            {{--                <div class="portfolio-img rounded overflow-hidden">--}}
            {{--                    <img class="img-fluid" src="img/img-600x400-3.jpg" alt="">--}}
            {{--                    <div class="portfolio-btn">--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="img/img-600x400-3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="pt-3">--}}
            {{--                    <p class="text-primary mb-0">Solar Panels</p>--}}
            {{--                    <hr class="text-primary w-25 my-2">--}}
            {{--                    <h5 class="lh-base">We Are pioneers of solar & renewable energy industry</h5>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-lg-4 col-md-6 portfolio-item second">--}}
            {{--                <div class="portfolio-img rounded overflow-hidden">--}}
            {{--                    <img class="img-fluid" src="img/img-600x400-2.jpg" alt="">--}}
            {{--                    <div class="portfolio-btn">--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="img/img-600x400-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="pt-3">--}}
            {{--                    <p class="text-primary mb-0">Wind Turbines</p>--}}
            {{--                    <hr class="text-primary w-25 my-2">--}}
            {{--                    <h5 class="lh-base">We Are pioneers of solar & renewable energy industry</h5>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-lg-4 col-md-6 portfolio-item third">--}}
            {{--                <div class="portfolio-img rounded overflow-hidden">--}}
            {{--                    <img class="img-fluid" src="img/img-600x400-1.jpg" alt="">--}}
            {{--                    <div class="portfolio-btn">--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="img/img-600x400-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>--}}
            {{--                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href=""><i class="fa fa-link"></i></a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="pt-3">--}}
            {{--                    <p class="text-primary mb-0">Hydropower Plants</p>--}}
            {{--                    <hr class="text-primary w-25 my-2">--}}
            {{--                    <h5 class="lh-base">We Are pioneers of solar & renewable energy industry</h5>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
<style>

    .post_image {
        width: 100%;
    }

    .post_content {
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: left;
    }

    .custom-height-popup {
        /*height: 300px;  !* 指定您想要的高度 *!*/
        margin: 20px;
    }
</style>
<!-- Projects End -->
<script>
    $(function () {
        var holidayAry = {!! json_encode($holidayAry) !!};//休假日宣告
        var count_time = {!! json_encode($count_time) !!};

        $(document).on('click', '.post_detail', function (e) {
            var post_id = $(this).data('post');
            // console.log(post_id)
            var pPost_json = {!! json_encode($pPost) !!};
            var post = pPost_json[post_id];
            var h =
                `<img class="post_image" src="{{ asset("storage") }}/` + post['image_path'] + `" alt="Custom Icon"><div class="post_content">` + post['content'] + `</div>`;
            // console.log(post)
            Swal.fire({
                width: 480,
                customClass: {
                    heightAuto: false,  // 預防 SweetAlert 自動計算高度
                    popup: 'custom-height-popup'  // 指定 CSS 類名
                },
                title: post['title'],
                // text: post['content'],
                // text: "",
                {{--imageUrl: "{{ asset("storage") }}" + '/' + post['image_path'],--}}
                html: h,
                showCancelButton: false,
                showConfirmButton: false,  // 將確定按鈕隱藏
                // confirmButtonText: 'Yes, delete it!',
                // cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // 用户点击了确认按钮
                    Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // 用户点击了取消按钮
                    Swal.fire('Cancelled', 'Your file is safe :)', 'error');
                }
            });
        });
        $(document).on('click', '.detail_data', function (e) {
            var container = $('.fc-scroller.fc-day-grid-container');

            // 檢查是否已經有了 .add_height 類別
            if (!container.hasClass('add_height')) {
                // 添加 .add_height 類別
                container.addClass('add_height');

                // 增加高度
                container.css('height', 'auto');
            } else {
                container.removeClass('add_height');
                container.css('height', 'auto');
                $('.detail_data').removeClass('active');
            }

            // $('.fc-scroller.fc-day-grid-container.add_height').removeClass('add_height');
        });

        $(document).on('click', '[name="week"]', function (e) {
            var week = $(this).attr('week');

            var container = $('.fc-scroller.fc-day-grid-container');

            // 檢查是否已經有了 .add_height 類別
            if (!container.hasClass('add_height')) {
                // 添加 .add_height 類別
                container.addClass('add_height');
                $('.detail_data.detail-' + week).addClass('active');
            } else {
                container.removeClass('add_height');
                $('.detail_data').removeClass('active');
                $('.detail_data').removeClass('active');
            }
            // 增加高度
            container.css('height', 'auto');
        });

        $(document).on('click', '.fc-right', function (e) {

            updateCalendar();

        });
        $(document).on('click', '.fi-btn-label', function (e) {

            // 找到最接近的表单元素
            var form = $(this).closest('form');

            // 获取表单中所有数据
            var formData = form.serializeArray();

            // 打印数据到控制台（你可以根据需要进行其他处理）
            alert(formData)
            // console.log();

        });
        $(document).ready(function () {
            initializeCalendar(holidayAry, count_time);
            $('.fc-dayGrid-view').prepend({!! json_encode($note[0]) !!});
            updateCalendar(holidayAry, count_time);
        });
    });

    function updateCalendar(holidayAry, count_time) {
        var container = $('.fc-scroller.fc-day-grid-container');
        container.css('height', 'auto');
        var weekElements = $('.fc-row.fc-week.fc-widget-content.fc-rigid');
        var ptime_json = {!! json_encode($pReserve) !!};

        weekElements.each(function (index, weekElement) {
            $(weekElement).attr('week', index + 1); // 先把週打進去

            var array_data = $(`[week="${index + 1}"] .fc-content-skeleton .fc-day-top`);

            // 這裡你可以對每一周的元素進行操作
            var detail_data = `
            <div class="detail_data detail detail-${index + 1}">
              @foreach($ptime as $time)
            <div style=" background-color: {{ ($time['id'] % 2 !== 0) ? '#D1D7DF56' : '#9abcd256' }}">
                    <table>
                        <a style="width: 85px" class="time_title fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                            <div class="fc-content">
                                <span class="">{{ $time['time']}}</span>
                            </div>
                            <div class="fc-resizer fc-end-resizer"></div>
                        </a>
                        <tbody>
                            <tr>
                                ${array_data.map(function (innerIndex, element) {
                var data = $(element).attr('data-date');
                var cleanedData = data.replace(/-/g, '');
                var time = "{{str_replace(['-', ':'], '', $time['time'])}}";//加雙引號0才不會被吃掉
                var concatenatedString = cleanedData + time;
                var textValue = (ptime_json[concatenatedString]? ptime_json[concatenatedString].text : '-');
                var data_color = ptime_json[concatenatedString] ? 'background-color:' + ptime_json[concatenatedString].bcolor + '; color:' + ptime_json[concatenatedString].tcolor : '';
                return `<td style=" ${data_color}" data="${data}">${textValue??' '}</td>`;
            }).get().join('')}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
`;

            // 將超連結添加到元素中
            $(weekElement).attr('name', 'week');
            $(weekElement).after(detail_data);
        });
        $('.fc-right>button').text('今天');
    }

    function initializeCalendar(holidayAry, count_time) {
        var calendarEl = $('#calendar');
        var events = [];

        for (var date in holidayAry) {
            var timePeriods = holidayAry[date];
6
            for (var i = 0; i < timePeriods.length; i++) {
                if (i === count_time - 1) {
                    var eventObject = {
                        title: '公休日',
                        start: date,
                        backgroundColor: '#777888',
                    };
                    events.push(eventObject);
                }
            }
        }

        var calendar = new FullCalendar.Calendar(calendarEl[0], {
            plugins: ['interaction', 'dayGrid'],
            defaultDate: new Date(),
            editable: false,
            eventLimit: true,
            locale: 'zh-tw',
            events: events,
        });

        calendar.render();
    }

    // document.addEventListener('DOMContentLoaded', function () {
    //     var calendarEl = document.getElementById('calendar');
    //
    //     console.log(holidayAry)
    //     var events = [];
    //
    //
    //     for (var date in holidayAry) {
    //         // 获取当前日期对应的时间段数组
    //         var timePeriods = holidayAry[date];
    //
    //         // // 遍历时间段数组
    //         for (var i = 0; i < timePeriods.length; i++) {
    //             if (i == count_time - 1) {
    //                 var eventObject = {
    //                     title: '公休日',
    //                     start: date, // 拼接日期和时间段
    //                     backgroundColor: 'red',
    //                 };
    //                 console.log(date)
    //                 // 将事件对象添加到数组中
    //                 events.push(eventObject);
    //             }
    //
    //         }
    //     }
    //     console.log(holidayAry, count_time)
    //     var calendar = new FullCalendar.Calendar(calendarEl, {
    //             plugins: ['interaction', 'dayGrid'],
    //             defaultDate: new Date(), // 設置為當前日期
    //             editable: false,
    //             eventLimit: true, // allow "more" link when too many events
    //             locale: 'zh-tw', // 設置語言為中文（台灣）
    //             events: events,
    //
    //         })
    //     ;
    //
    //     calendar.render();
    // });

</script>
