@if($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination pagination-template d-flex justify-content-center">
        @if(!$paginator->onFirstPage())    
            <li class="page-item"><a href="{{$paginator->previousPageUrl()}}" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
        @endif

        @if(is_array($elements[0]))
            @foreach($elements[0] as $page=>$url)
                <li class="page-item"><a href="{{$url}}" class="page-link active">{{$page}}</a></li>
            @endforeach
        @endif 

        @if($paginator->hasMorePages())    
            <li class="page-item"><a href="{{$paginator->previousPageUrl()}}" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
        @endif
    </ul>
</nav>
 @endif