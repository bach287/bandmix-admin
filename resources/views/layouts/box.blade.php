<div class="x_panel">
    <div class="x_title">
        <h2>{{!empty($box_title)?$box_title:''}}</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        {{ $slot }}

    </div>
</div>