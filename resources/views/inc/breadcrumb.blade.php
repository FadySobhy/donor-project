<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($links AS $link)
                        <li class="breadcrumb-item"><a href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
                    @endforeach
                    <li class="breadcrumb-item active">{{ $active }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ $title }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
