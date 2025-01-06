
<div class="col-sm-6">
    <h3>{{$title ?? ''}}</h3>
    @if (isset($breadcrumbs))
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $item)
        @if (isset($item['url']))
        <li class="breadcrumb-item"><a href="<?= $item['url']?>">{{$item['title']}}</a></li>
        @else
        <li class="breadcrumb-item">{{$item['title']}}</li>
        @endif
        @endforeach
    </ol>
    @endif
</div>